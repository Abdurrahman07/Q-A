@extends('admin.layout.app')


@section('content')



<a href="/admin/questions/add" class="btn btn-sm btn-primary pull-right">Add Question </a>
<table class="table table-responsive">
	<thead>
		<tr>
			<th>ID.</th>
			<th>Question</th>
			<th>Correct Answer</th>
			<th>
			Actions
			</th>
		</tr>
	</thead>
	<tbody>
		@foreach($questions AS $question)
		<tr>
			<td>{{ $question->id }}</td>
			<td><a href="/admin/questions/{{$question->question}}">{{ str_slug($question->question, ' ') }}</a></td>
			<td>{{ $question->points }}</td>
			<td><a href="/admin/questions/{{ $question->question }}/edit" class="btn btn-success btn-sm">Edit</a>
				<a href="/admin/questions/{{ $question->question }}/delete" class="btn btn-danger btn-xs">Delete</a></td>
		</tr>
		@endforeach
	</tbody>
</table>

@endsection