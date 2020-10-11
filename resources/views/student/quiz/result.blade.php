@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Your is result') }}</div>

                <div class="card-body">
                    <table class="table">
                        <thead class="thead-light">
                        <tr>
                            <th scope="col">Broj tocnih odgovora</th>
                            <th scope="col">Broj netocnih odgovora</th>
                            <th scope="col">Vas rezultat</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>{{ $numberCorrect}}</td>
                            <td>{{ $numberInaccuracy }}</td>
                            <td>{{ $totalResult }} %</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection

