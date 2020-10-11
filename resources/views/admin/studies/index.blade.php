@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">{{ __('Studies') }}
                <a href="{{ route('admin.studies.create') }}" class="btn btn-outline-primary float-right">Add study</a>
            </div>

            <div class="card-body">
                <table class="table">
                    <thead class="thead-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                     @foreach($studies as $study)
                        <tr>
                            <th scope="row">{{ $study->id }}</th>
                            <td>{{ $study->name }}</td>
                            <td>
                                <a href="{{ route('admin.studies.edit', $study->id) }}"><button class="btn btn-outline-primary">Edit</button></a>
                            </td>
                            <td>
                                <form action="{{ route('admin.studies.destroy', $study->id) }}" method="post">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Are you sure you want to delete this item?');">Delete</button>
                                </form>
                            </td>
                        </tr>
                     @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
