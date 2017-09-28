
@extends('admin.layout.app')

@section('content')

<h2 class="text-center" style="padding: 10px 0;">Profile.</h2>
<div class="panel panel-primary">
	<div class="panel-heading">User Card</div>
	<div class="panel-body">
		<p><span style="margin-right: 5px;" class="label label-info">name : </span>  {{ str_slug($user->name, ' ') }}</p>
		<p><span style="margin-right: 5px;" class="label label-info">email : </span>  {{ $user->email }}</p>
		<p><span style="margin-right: 5px;" class="label label-info">points : </span>  {{ $user->points }}</p>

		<p><a href="/admin/users/{{$user->name}}/edit" style="margin-right: 5px;" class="pull-right btn btn-warning btn-xs">Edit</a></p>


	</div>
</div>


@endsection