
@extends('admin.layout.app')

@section('content')

<h2 class="text-center" style="padding: 10px 0;"> New User </h2>

{{ Form::open([ 'route' => 'add.question']) }}
	<div class="form-group">
	{{ Form::text('question', null , ['placeholder' => 'Question' ,'class' => 'form-control'])}}
	</div>

	<div class="form-group">
	{{ Form::text('answers[]', null , ['placeholder' => 'Choice 1' ,'class' => 'form-control'])}}
	</div>

	<div class="form-group">
	{{ Form::text('answers[]', null , ['placeholder' => 'Choice 2' ,'class' => 'form-control'])}}
	</div>

	<div class="form-group">
	{{ Form::text('answers[]', null , ['placeholder' => 'Choice 3' ,'class' => 'form-control'])}}
	</div>

	<div class="form-group">
	{{ Form::text('answers[]', null , ['placeholder' => 'Choice 4' ,'class' => 'form-control'])}}
	</div>

	<div class="form-group">
	{{ Form::text('correct_answer', null , ['placeholder' => 'Correct answer' ,'class' => 'form-control'])}}
	</div>

	<div class="form-group">
	{{ Form::submit('Add', ['class' => 'btn btn-primary btn-sm'])}}
	</div>

{{ Form::close() }}

@endsection


