
@foreach($questions AS $question) 

@if(! $question->answers->contains('user_id',Auth::user()->id) )
	
	{{ $question->question }}

@endif

@endforeach