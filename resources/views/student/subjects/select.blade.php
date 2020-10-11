@extends('layouts.app')

@section('content')


    <div class="row justify-content-center">

        <div class="col-md-8">
            <div class="card" style="width:28rem;">
                <div class="card-header">
                    <b>Choose subject</b>
                </div>
                <ul class="list-group list-group-flush">
                    @foreach($subjects as $subject)
                        <li class="list-group-item">
                            <a href="{{ route('student.show', $subject->id) }}">{{ $subject->name }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

@endsection