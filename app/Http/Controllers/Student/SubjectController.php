<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Student;
use App\Study;
use App\Subject;
use App\User;
use Auth;
use DB;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $student_id = Student::where('user_id', Auth::user()->id)->first()->id;

        $student = Student::find($student_id);

        //$subjects = Subject::where('student_id', $student_id)->get();

        return view('student.subjects.index')->with('student', $student);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $student_id = Student::where('user_id', Auth::user()->id)->first()->id;

        $study_id = DB::table('study_student')->where('student_id', $student_id)->first();

        if ($study_id) {
            $subjects = Subject::where('study_id', $study_id->study_id)->get();
            return view('student.subjects.create')->with('subjects', $subjects);
        }
        return redirect()->route('student.studies.index')->with('warning', 'You must first select a study');


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
            'subject' => 'required',
        ]);

        $student_id = Student::where('user_id', Auth::user()->id)->first()->id;

        //$study_id = Study::where('student_id', Auth::user()->id)->first()->id;
        $study_id = DB::table('study_student')->where('student_id', $student_id)->first()->id;

        $subject = DB::table('subject_student')
            ->updateOrInsert(
                ['subject_id' => $request->subject],
                ['study_id' => $study_id, 'student_id' => $student_id]
            );

        if ($subject) {
            return redirect()->route('student.subjects.index')->with('success', 'You have successfully added new subject');
        }
        return redirect()->route('student.subjects.index')->with('warning', 'You failed to add a subject');
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subject = DB::table('subject_student')->where('subject_id', $id)->delete();

        if ($subject) {
            return redirect()->route('student.subjects.index')->with('success', 'You have successfully deleted subject');
        }
    }

    public function select (Request $request)
    {
        $student_id = Student::where('user_id', Auth::user()->id)->first()->id;

        $student = Student::find($student_id);

        $subjects = $student->subjects;

        return view('student.subjects.select')->with('subjects', $subjects);
    }
}
