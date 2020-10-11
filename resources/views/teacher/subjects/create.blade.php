@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add subject') }}</div>

                <div class="card-body">
                    <form action="{{ route('teacher.subjects.store') }}" method="post">
                        @csrf

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="exampleInputSubject">Enter subject name</label>
                                <input type="text" name="subject" class="form-control" id="exampleInputSubject" aria-describedby="subjectHelp"
                                       value="{{ old('subject') }}">
                                @error('subject')
                                <small id="subjectHelp" class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group col-md-2">
                                <label for="exampleInputEcts">Enter ECTS</label>
                                <input type="number" min="1" max="10" name="ects" class="form-control" id="exampleInputEcts" aria-describedby="ectsHelp"
                                       value="{{ old('ects') }}">
                                @error('ects')
                                <small id="ectsHelp" class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exampleFormControlSelect">Choose study</label>
                                <select class="form-control" name="study" id="exampleFormControlSelect">
                                    @foreach($studies as $study)
                                        <option value="{{ $study->id }}">{{ $study->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-outline-primary btn-block">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
