@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Study') }}</div>

                    <div class="card-body">

                        <form action="{{ route('admin.studies.update', $study) }}" method="post">
                            @csrf
                            {{ method_field('PUT') }}
                                <div class="form-group">
                                    <label for="study">Study</label>
                                    <input type="text" name="study" id="study" value="{{ $study->name }}" class="form-control">
                                    @error('study')
                                    <small id="studyHelp" class="form-text text-danger">{{ $message }}</small>
                                    @enderror
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
