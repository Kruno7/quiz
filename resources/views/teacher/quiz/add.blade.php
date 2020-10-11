@extends('layouts.app')

@section('content')



<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">{{ __('Add Quiz') }}</div>

            <div class="card-body">
                <form action="{{ route('teacher.quiz.store') }}" method="post">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-8">
                            <label for="inputSubject">Subject</label>
                            <select id="inputSubject" name="subject" class="form-control">
                                <option selected>Choose...</option>
                                @foreach($subjects as $subject)
                                <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputQuizName">Quiz name</label>
                            <input type="text" name="quiz" class="form-control" id="inputQuizName">
                        </div>

                    </div>

                    <button type="submit" class="btn btn-outline-primary btn-block">Add</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
