@extends('layouts.tweetIndex') 

@section('add-prof-photo')
	@if(Auth::user()->nickname == $user->nickname)
		<a href="{{ url("users/profiles/picture/" . Auth::user()->nickname) }}">
		    <button type="button" class="btn btn-primary btn-block">
		      <span class="glyphicon glyphicon-plus"></span> Add Profile Picture
		    </button>
		</a>
	@endif	
	<!-- <a href="{{ url("/") }}">
	    <button type="button" class="btn btn-primary btn-block">
	      <span class="glyphicon glyphicon-plus"></span> Update Profile Picture
	    </button>
	</a> -->
@stop

@section('userInfo')
	<p class="user-name">{{ link_to("users/profiles/$user->nickname", $user->name) }}</p>
	<h5 class="nickname">{{ link_to("users/profiles/$user->nickname", '@'.$user->nickname) }}</h5>
@stop

@section('formToTweetAndInfos')
	<li class="list-group-item">Tweets &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{ link_to("users/profiles/".$user->nickname, $tweetCount) }}</li>
  	<li class="list-group-item">Following &nbsp;&nbsp; {{ link_to('users/profiles/following/'.$user->nickname, $followingCount) }}</li>
  	<li class="list-group-item">Followers &nbsp;&nbsp; {{ link_to('users/profiles/followers/'.$user->nickname, $followersCount) }}</li>

	@if((Auth::user()->nickname != $user->nickname) && ($following == false))
	<li class="list-group-item list-group-item-success">
		<a href="{{ url("follow/{$user->nickname}") }}">
			<button type="button" class="btn btn-success">
				<span class="glyphicon glyphicon-star"></span> Follow
			</button>
		</a>
		<div class="clear"></div>

	</li>
	@endif

	@if((Auth::user()->nickname != $user->nickname) && ($following == true))
	<li class="list-group-item list-group-item-success">
		<a href="{{ url("unfollow/{$user->nickname}") }}">
			<button type="button" class="btn btn-danger">
				<span class="glyphicon glyphicon-remove"></span> Unfollow
			</button>
		</a>
		<div class="clear"></div>

	</li>
	@endif
@stop


                        

