<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Major;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MajorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $major = Major::get();

        return view('admin.manage-major.index',compact('major'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.manage-major.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         // validate

         $message = [

            // required
            'name.required' => "Kolom nama tidak boleh kosong",

            // unique
            'name.unique'   => "Nama sudah di gunakan",

        ];
        $validate = Validator::make($request->all(), [
            'name'           => 'required|unique:majors,name',
        ], $message);
        if ($validate->fails()) {
            return redirect()->back()->with('error', 'Data gagal di tambahkan')->withErrors($validate)->withInput();
        }
        // dd($request->all());
        // new User
        $newSubject = new Major();
        $newSubject->name = $request->name;
        $newSubject->save();

        return redirect()->route('manage-major')->with('success', 'Data berhasil di tambahkan');
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
        $major = Major::findOrFail($id);

        return view('admin.manage-major.edit',compact('major'));
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
           // validate

           $message = [

            // required
            'name.required' => "Kolom nama tidak boleh kosong",

            // unique
            'name.unique'   => "Nama sudah di gunakan",

        ];
        $validate = Validator::make($request->all(), [
            'name'           => 'required|unique:majors,name,' .$id
        ], $message);
        if ($validate->fails()) {
            return redirect()->back()->with('error', 'Data gagal di tambahkan')->withErrors($validate)->withInput();
        }
        // dd($request->all());
        // new User
        $newSubject = Major::findOrFail($id);
        $newSubject->name = $request->name;
        $newSubject->save();

        return redirect()->route('manage-major')->with('success', 'Data berhasil di tambahkan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subject = Major::findOrFail($id)->delete();

        return redirect()->route('manage-major')->with('success', 'Data berhasil di hapus');
    }
}
