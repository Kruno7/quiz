@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Subjects') }}</div>

                <div class="card-body">
                    <form action="{{ route('student.subjects.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Choose subject</label>
                            <select class="form-control" name="subject" id="exampleFormControlSelect1">
                                <option selected="true" disabled="disabled">Choose...</option>
                                @foreach($subjects as $subject)
                                    <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-outline-primary">Add subject</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection


