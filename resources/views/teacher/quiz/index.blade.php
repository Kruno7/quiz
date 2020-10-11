@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">{{ __('Dashboard') }}</div>

            <div class="card-body">
                <div id="page-wrap">

                    <h1>Simple Quiz Built On PHP</h1>

                    <form action="{{-- route('quiz.store') --}}" method="post" id="quiz">
                        @csrf
                        @foreach($questions as $question)
                            <ol>
                                <li>
                                    <h3>{{ $question->question }}...</h3>
                                    @foreach($question->answers as $answer)
                                        <div>
                                            <input type="checkbox" name="quizcheck[{{ $answer->id }}]" id="question-1-answers-A" value="{{ $answer->question_id }}" />
                                            <label for="question-1-answers-A"> {{ $answer->answer }} </label>

                                            <!--<input type="radio" name="quizcheck[{{ $answer->id }}]"
                                       value="<?php //echo $rows1['question_id']; ?>" id="question-1-answers-A">
                                <label for="question-1-answers-A"><?php //echo $rows1['answer']; ?></label>-->
                                        </div>
                                    @endforeach
                                </li>
                            </ol>
                        @endforeach
                        <input type="submit" name="submit" value="submit" class="submitbtn" />

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
