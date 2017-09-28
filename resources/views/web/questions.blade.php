@extends('web.layout.app')

@section('content')


	
	<div class="container">

		<table class="table ">
			<thead>
				<tr>
					<th>ID</th>
					<th>Question</th>
					<th>Answer it</th>
				</tr>
			</thead>

			<tbody>
				@foreach($questions AS $question)
				<tr>
					<td>{{ $question->id }}</td>
					<td>{{ str_slug($question->question, ' ') }}</td>
					<td><a href="/{{ $question->question}}/answer" class="btn btn-waring">Answer it</a></td>
				</tr>
				@endforeach
			</tbody>
		</table>

	</div>

@endsection