@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Subject') }}</div>

                    <div class="card-body">

                        <form action="{{ route('teacher.subjects.update', $subject) }}" method="post">
                            @csrf
                            {{ method_field('PUT') }}
                            <div class="form-row">
                                <div class="form-group col-md-8">
                                    <label for="subject">Subject</label>
                                    <input type="text" name="subject" id="subject" value="{{ $subject->name }}" class="form-control">
                                    @error('subject')
                                    <small id="subjectHelp" class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="ects">ECTS</label>
                                    <input type="number" min="1" max="10" name="ects" id="ects" value="{{ $subject->ects }}" class="form-control">
                                    @error('ects')
                                    <small id="ectsHelp" class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                            </div>
                            <button type="submit" class="btn btn-outline-primary">
                                Update
                            </button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
