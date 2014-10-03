@extends('layouts.tweetIndex') 

@section('userInfo')
	<p class="user-name">{{ link_to("users/profiles/$user->nickname", $user->name) }}</p>
	<h5 class="nickname">{{ link_to("users/profiles/$user->nickname", '@'.$user->nickname) }}</h5>
@stop

@section('formToTweet')
	@if(Auth::user()->nickname != $user->nickname)
	<li class="list-group-item list-group-item-success">
		<a href="{{ url("follow/{$user->nickname}") }}">
			<button type="button" class="btn btn-success">
				<span class="glyphicon glyphicon-star"></span> Follow
			</button>
		</a>
		<div class="clear"></div>

	</li>
	@endif

	@if(Auth::user()->nickname != $user->nickname)
	<li class="list-group-item list-group-item-success">
		<a href="{{ url('/edit') }}">
			<button type="button" class="btn btn-danger">
				<span class="glyphicon glyphicon-remove"></span> Unfollow
			</button>
		</a>
		<div class="clear"></div>

	</li>
	@endif
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

                        

