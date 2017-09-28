
@extends('admin.layout.app')

@section('content')

<h2 class="text-center" style="padding: 10px 0;"> New User </h2>

{{ Form::open([ 'route' => 'add.user']) }}
	<div class="form-group">
	{{ Form::text('name', null , ['placeholder' => 'Name' ,'class' => 'form-control'])}}
	</div>

	<div class="form-group">
	{{ Form::email('email', null , ['placeholder' => 'E-mail' ,'class' => 'form-control'])}}
	</div>

	<div class="form-group">
	{{ Form::password('password' , ['placeholder' => 'password' ,'class' => 'form-control'])}}
	</div>

	<div class="form-group">
	{{ Form::submit('Add', ['class' => 'btn btn-primary btn-sm'])}}
	</div>

{{ Form::close() }}

@endsection


