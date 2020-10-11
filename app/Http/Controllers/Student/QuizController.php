<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Quiz;
use App\Student;
use Auth;
use App\Answer;

class QuizController extends Controller
{

    public function show ($id)
    {

        $subject_id = DB::table('subject_student')->where('subject_id', $id)->first()->subject_id;

        $quiz = Quiz::where('subject_id', $subject_id)->first();

        if (!empty($quiz)) {
            $quiz->load('questions.answers');
            return view('student.quiz.show')->with([
                'quiz' => $quiz,
            ]);
        }

        return redirect()->route('student.subjects.select')->with('warning', 'This subject does not have a quiz');

    }

    public function storeResult (Request $request)
    {
        $data = $request->validate([
            'quizcheck' => 'required',

        ]);


        $student = Student::where('user_id', Auth::user()->id)->first()->id;
        $student_id = Student::find($student);

        $quiz = Quiz::find($request->quiz_id);

        $totalQuestions = count($quiz->questions);

        $selected = $data['quizcheck'];
        $count = 0;
        $result = 0;


        foreach ($quiz->questions as $question) {
            $correct = 0;

            foreach ($question->answers as $answer) {

                if ($question->id == $answer->question_id && $answer->correct == 1) {
                    $correct++;

                    if ($answer->id == !empty($selected[$answer->id])) {

                        $numberQuestion = Answer::where('question_id', $answer->question_id)
                            ->where('correct', 1)->get();
                        $countQuestionInDB = $numberQuestion->count();

                        $result++;

                        if ($correct < $countQuestionInDB) {
                            $count++;
                        }
                    }
                }
            }
        }


        $numberCorrect = ($result - $count);
        $numberInaccuracy = ($totalQuestions - $numberCorrect);
        $totalResult = ($numberCorrect) / $totalQuestions * 100;

        DB::table('result_student')->insert([
            'student_id' => $student_id->id,
            'quiz_id' => $request->quiz_id,
            'correct' => $numberCorrect,
            'wrong' => $numberInaccuracy,
            'total' => $totalResult,
        ]);

        return view('student.quiz.result')->with([
            'numberCorrect' => $numberCorrect,
            'numberInaccuracy' => $numberInaccuracy,
            'totalResult' => $totalResult
        ]);
    }
}
