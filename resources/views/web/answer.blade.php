@extends('web.layout.app')

@section('content')

{{ Form::open(['route' =>  [ 'useranswer', $question->question] ]) }}

	@foreach(json_decode($question->answers) AS $answer)

	<input type="radio" name="answer" value="{{ $answer }}">
	<label style="display: inline;">{{ $answer }}</label>
	<br>
	@endforeach

	{{ Form::submit('submit') }}
{{ Form::close() }}


@endsection