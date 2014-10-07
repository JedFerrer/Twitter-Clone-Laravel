@extends('profile.default') 

@section('loop-title')
	Tweets
@stop

@section('loop-content')

	@if($user->count())
	    @foreach($user->tweets as $tweet)
        	<div class="list-group-item">

    			<h5 class="list-group-item-heading"><b>{{ link_to("users/profiles/".$user->nickname, $user->name . '&nbsp;&nbsp;&nbsp;@' . $user->nickname) }}</b></h5>
    			<p class="list-group-item-text">{{ $tweet->tweet }}</p>
  			</div>
  		@endforeach
	@else
		<div class="list-group-item">
			<p>Unfortunately, there are no Tweets to show.</p>
		</div>
	@endif



@stop
