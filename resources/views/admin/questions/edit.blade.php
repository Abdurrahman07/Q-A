
@extends('admin.layout.app')

@section('content')


{{ Form::model($question, [ 'route' => ['edit.question', $question->question ]]) }}

	<div class="form-group">
	{{ Form::text('question', str_slug($question->question, ' ' ) , ['class' => 'form-control'])}}
	</div>

	@foreach(json_decode($question->answers) AS $answer)
	<div class="form-group">
		<input type="text" name="answers[]" value="{{ $answer }}" class="form-control" placeholder="Choice" >
	</div>
	@endforeach
	<div class="form-group">
	{{ Form::text('correct_answer', null , ['placeholder' => 'Correct answer' ,'class' => 'form-control'])}}
	</div>

	<div class="form-group">
	{{ Form::submit('Edit', ['class' => 'btn btn-success btn-sm'])}}
	</div>

{{ Form::close() }}

@endsection


