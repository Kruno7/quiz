<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Study;
use Illuminate\Http\Request;

class StudyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.studies.index')->with('studies', Study::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.studies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'study' => 'required|min:2'
        ]);

        $study = Study::create([
            'name' => $request->study,
        ]);
        if ($study->save()) {
            return redirect()->route('admin.studies.index')->with('success', 'You have successfully study');
        }
        return redirect()->route('admin.studies.index')->with('error', 'You failed to add a study');
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
        return view('admin.studies.edit')->with('study', Study::find($id));
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
        $request->validate([
            'study' => 'required|min:2'
        ]);

        $study = Study::updateOrCreate([
            'id'   => $id,
        ]);
        $study->name = $request->study;
        if ($study->save()) {
            return redirect()->route('admin.studies.index')->with('success', 'You have successfully uploaded study');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Study::destroy($id);
        return redirect()->route('admin.studies.index')->with('success', 'You have successfully removed study');
    }
}
