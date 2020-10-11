<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Subject;
use App\Quiz;

class QuizController extends Controller
{
    public function add ()
    {
        return view('teacher.quiz.add')->with('subjects', Subject::all());
    }

    public function storeQuiz (Request $request)
    {
        $request->validate([
            'quiz'    => 'required|min:2',
            'subject' => 'required'
        ]);

        $quiz = Quiz::create([
            'name' => $request->quiz,
            'teacher_id' => Auth::user()->id,
            'subject_id' => $request->subject
        ]);

        if ($quiz->save()) {
            return redirect()->route('teacher.quiz.add')->with('success', 'You have successfully added new Quiz');
        }

    }


    public function addQuestionAndAnswers ()
    {
        return view('teacher.quiz.addQA')->with('quizzes', Quiz::all());
    }

    public function storeQuestionAndAnswers (Request $request)
    {

        $data = $request->validate([
            'quiz' => 'required',
            'question.question' => 'required',
            'answers.*.answer' => 'required',
            'correct' => 'max:14'
        ]);
        $quiz = Quiz::find($request->quiz);
        $correct = array($request->correct1, $request->correct2, $request->correct3, $request->correct4);

        $question = $quiz->questions()->create($data['question']);

        foreach ($data['answers'] as $key => $answer) {

            $answer['correct'] = $correct[$key];

            $allAnswer = array($answer);
            $question->answers()->createMany($allAnswer);

        }
        return redirect()->route('teacher.quiz.addQA')->with('success', 'You have successfully added question and answers');
    }


}
