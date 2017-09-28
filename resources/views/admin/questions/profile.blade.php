
@extends('admin.layout.app')

@section('content')

<h2 class="text-center" style="padding: 10px 0;">Profile.</h2>
<div class="panel panel-primary">
	<div class="panel-heading">Question Card</div>
	<div class="panel-body">
		<p><span style="margin-right: 5px;" class="label label-info">question : </span>  {{ str_slug($question->question, ' ') }}</p>
		
		<p><span style="margin-right: 5px;" class="label label-info">choices : </span>  

		 @foreach(json_decode($question->answers) AS $answer) {{$answer }},  @endforeach
		</p>

		<p><span style="margin-right: 5px;" class="label label-info">correct answer : </span>  {{ $question->correct_answer }}</p>

		<p><a href="/admin/questions/{{$question->question}}/edit" style="margin-right: 5px;" class="pull-right btn btn-warning btn-xs">Edit</a></p>


	</div>
</div>


@endsection