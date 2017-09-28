
@extends('admin.layout.app')

@section('content')

<h2 class="text-center" style="padding: 10px 0;">Edit -> {{ str_slug($user->name, ' ' )}}</h2>

{{ Form::model($user, [ 'route' => ['edit.user', $user->name ]]) }}
	<div class="form-group">
	{{ Form::text('name', str_slug($user->name, ' ' ) , ['class' => 'form-control'])}}
	</div>

	<div class="form-group">
	{{ Form::email('email', null , ['class' => 'form-control'])}}
	</div>

	<div class="form-group">
	{{ Form::password('password' , ['placeholder' => 'New password' ,'class' => 'form-control'])}}
	</div>

	<div class="form-group">
	{{ Form::submit('Edit', ['class' => 'btn btn-success btn-sm'])}}
	</div>

{{ Form::close() }}

@endsection


