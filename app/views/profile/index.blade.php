@extends('layouts.tweetIndex') 

@section('userNameLink')
	{{ link_to("user/profile/$user->nickname", $user->name) }}
@stop

@section('tweets')
	@if($user->count())
	    @foreach($user->tweets as $tweet)
        	<a href="#" class="list-group-item">
    			<h5 class="list-group-item-heading"><b>{{ $user->name }}</b>&nbsp;&nbsp;<span>@</span><span>{{ $user->nickname }}</span></h5>
    			<p class="list-group-item-text">{{ $tweet->tweet }}</p>
  			</a>
  		@endforeach
	@else
		<p>Unfortunately, there are no Tweets to show.</p>
	@endif
@stop

                        

