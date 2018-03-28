@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card card-default">
                    <div class="card-header">All Funds</div>

                    <div class="card-body">
                    <table class="table">
                        <tr>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Market Value (CAD)</th>
                            <th>Risk Level</th>
                            <th>Created by</th>
                        </tr>
                        @foreach ($funds as $fund)
                            <tr>
                                <td><a href="/funds/{{ $fund->id }}">{{ $fund->name }}</a></td>
                                <td>{{ $fund->description }}</td>
                                <td>${{ number_format($fund->marketValue(), 2) }}</td>
                                <td>{{ $fund->risk->name }}</td>
                                <td><a href="/trader/{{ $fund->user->id }}">{{ $fund->user->first_name . " " . $fund->user->last_name }}</a></td>
                            </tr>
                        @endforeach
                    </table>
                    @if ($user->isTrader())
                        <a href="/funds/create"><button class="btn btn-primary">Create Fund</button></a>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection