@extends('admin.layout.app')

@section('content')

<h2 class="text-center" style="padding: 10px 0;">Questions.</h2>
<div class="panel-group">
	@foreach($questions AS $question)
	<div class="panel panel-primary">
	  <div class="panel-heading">{{ $question->questions->question }}</div>
	  <div class="panel-body">{{ $question->answer }}</div>
	  
	  <div style="padding:20px;" class="panel-footer"><a href="/admin/users/{{$user->name}}" style="margin-top: -10px;" class="pull-right">{{ str_slug($user->name, ' ') }}</a></div>
	</div>
	@endforeach
</div>

@endsection