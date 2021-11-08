<?php

namespace App\Http\Controllers\Admin;

use App\Announcement;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Announcement::all();
        return view('admin.manage-announcement.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.manage-announcement.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $message = [

            // required
            'title.required' => "Kolom judul tidak boleh kosong",
            'start_time.required' => "Kolom tanggal tidak boleh kosong",
            'end_time.required' => "Kolom tanggal tidak boleh kosong",
            'description.required' => "Kolom deskripsi tidak boleh kosong",

            'title.max' => "Jumlah karakter terlalu banyak",


            // date
            'start_time.date' => "Harus menggunakan format tanggal",
            'end_time.after' => "Waktu tidak valid",
        ];
        $validate = Validator::make($request->all(), [
            'title'           => 'required|max:255',
            'start_time'    => 'required|date',
            'end_time'    => 'after:start_time',
            'description'    => 'required',
        ], $message);
        if ($validate->fails()) {
            return redirect()->back()->with('error', 'Data gagal di tambahkan')->withErrors($validate)->withInput();
        }

        $post = new Announcement();
        $post->title = $request->title;
        $post->start_time = Carbon::parse($request->start_time)->format('Y-m-d');
        $post->end_time = Carbon::parse($request->end_time)->format('Y-m-d');
        $post->description = $request->description;
        $post->save();
        return redirect()->route('manage-announcement')->with('success','Data berhasil di tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Announcement::find($id);
        return view('admin.manage-announcement.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $message = [

            // required
            'title.required' => "Kolom judul tidak boleh kosong",
            'start_time.required' => "Kolom tanggal tidak boleh kosong",
            'end_time.required' => "Kolom tanggal tidak boleh kosong",
            'description.required' => "Kolom deskripsi tidak boleh kosong",

            // max
            'title.max' => "Jumlah karakter terlalu banyak",


            // date
            'start_time.date' => "Harus menggunakan format tanggal",
            'end_time.after' => "Waktu tidak valid",
        ];
        $validate = Validator::make($request->all(), [
            'title'           => 'required|max:255',
            'start_time'    => 'required|date',
            'end_time'    => 'after:start_time',
            'description'    => 'required',
        ], $message);
        if ($validate->fails()) {
            return redirect()->back()->with('error', 'Data gagal di tambahkan')->withErrors($validate)->withInput();
        }

        $post = Announcement::find($id);
        $post->title = $request->title;
        $post->start_time = Carbon::parse($request->start_time)->format('Y-m-d');
        $post->end_time = Carbon::parse($request->end_time)->format('Y-m-d');
        $post->description = $request->description;
        $post->save();
        return redirect()->route('manage-announcement')->with('success','Data berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Announcement::find($id);
        $data->delete();
        return redirect()->route('manage-announcement')->with('success','Data berhasil di hapus');
    }
}
