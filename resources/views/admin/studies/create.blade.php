@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">{{ __('Add studies') }}</div>

            <div class="card-body">
                <form action="{{ route('admin.studies.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputStudy">Enter study name</label>
                        <input type="text" name="study" class="form-control" id="exampleInputStudy" aria-describedby="studyHelp">
                        @error('study')
                            <small id="studyHelp" class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-outline-primary btn-block">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
