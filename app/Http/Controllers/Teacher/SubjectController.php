<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Subject;
use App\Study;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('teacher.subjects.index')->with('subjects', Subject::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('teacher.subjects.create')->with('studies', Study::all());
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
            'subject' => 'required|min:2',
            'ects' => 'required|numeric',
            'study' => 'required'
        ]);
        $subject = Subject::create([
            'name' => $request->subject,
            'ects' => $request->ects,
            'study_id' => $request->study,
            'teacher_id' => Auth::user()->id,
        ]);
        if ($subject->save()) {
            return redirect()->route('teacher.subjects.index')->with('success', 'You have successfully subject');
        }
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
        return view('teacher.subjects.edit')->with('subject', Subject::find($id));
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
           'subject' => 'required',
            'ects' => 'required|numeric'
        ]);

        $subject = Subject::find($id);
        $subject->name = $request->subject;
        $subject->ects = $request->ects;

        if ($subject->save()) {
            return redirect()->route('teacher.subjects.index')->with('success', 'You have successfully updated subject');
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
        Subject::destroy($id);
        return redirect()->route('teacher.subjects.index')->with('success', 'You have successfully deleted subject');
    }
}
