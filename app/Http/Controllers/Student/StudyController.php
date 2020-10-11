<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Study;
use Auth;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class StudyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('student.study.index')->with('studies', Study::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'study' => 'required',
        ]);

        $student_id = Student::where('user_id', Auth::user()->id)->first()->id;
        $study = DB::table('study_student')->where('student_id', $student_id)->first();


        if ($study) {
            return redirect()->route('student.studies.index')->with('warning', 'You have already added a study');
        }


        DB::table('study_student')->insert([
            'study_id' => $request->study,
            'student_id' => $student_id,
        ]);

        return redirect()->route('student.studies.index')->with('success', 'You have successfully added study');


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
        //
    }
}
