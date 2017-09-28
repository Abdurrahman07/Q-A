@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <table class="table-resposive table">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>name</th>
                                <th>points</th>
                                <th>answers</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users AS $user )
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>0</td>
                                <td><a href="/useranswers/{{ $user->id }}"></a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
