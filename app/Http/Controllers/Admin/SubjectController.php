<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Subject;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subject = Subject::orderBy('name')->get();

        return view('admin.manage-subject.index',compact('subject'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subject = Subject::orderBy('name', 'asc')->get();

        return view('admin.manage-subject.create', compact('subject'));
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
            'name'           => 'required|unique:subjects,name',
        ], $message);
        if ($validate->fails()) {
            return redirect()->back()->with('error', 'Data gagal di tambahkan')->withErrors($validate)->withInput();
        }
        // dd($request->all());
        // new User
        $newSubject = new Subject();
        $newSubject->name = $request->name;
        $newSubject->save();

        return redirect()->route('manage-subject')->with('success', 'Data berhasil di tambahkan');
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
        $subject = Subject::findOrFail($id);

        return view('admin.manage-subject.edit',compact('subject'));
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
            'name'           => 'required|unique:subjects,name,' .$id
        ], $message);
        if ($validate->fails()) {
            return redirect()->back()->with('error', 'Data gagal di tambahkan')->withErrors($validate)->withInput();
        }
        // dd($request->all());
        // new User
        $newSubject = Subject::findOrFail($id);
        $newSubject->name = $request->name;
        $newSubject->save();

        return redirect()->route('manage-subject')->with('success', 'Data berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subject = Subject::findOrFail($id)->delete();

        return redirect()->route('manage-subject')->with('success', 'Data berhasil di hapus');
    }
}
