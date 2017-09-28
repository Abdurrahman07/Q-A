@extends('admin.layout.app')


@section('content')



<a href="/admin/users/add" class="btn btn-sm btn-primary pull-right">Add User</a>
<table class="table table-responsive">
	<thead>
		<tr>
			<th>ID.</th>
			<th>Name</th>
			<th>Points</th>
			<th>
			Actions
			</th>
			<th>Questions</th>
		</tr>
	</thead>
	<tbody>
		@foreach($users AS $user)
		<tr>
			<td>{{ $user->id }}</td>
			<td><a href="/admin/users/{{$user->name}}">{{ str_slug($user->name, ' ') }}</a></td>
			<td>{{ $user->points }}</td>
			<td><a href="/admin/users/{{ $user->name }}/edit" class="btn btn-success btn-sm">Edit</a>
				<a href="/admin/users/{{ $user->name }}/delete" class="btn btn-danger btn-xs">Delete</a></td>
			<td><a href="/admin/users/{{$user->name}}/uquestions" class="btn-sm btn-primary">Questions</a></td>
		</tr>
		@endforeach
	</tbody>
</table>

@endsection