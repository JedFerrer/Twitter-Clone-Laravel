@extends('layouts.tweetIndex') 

@section('add-prof-photo')
	@if(Auth::user()->nickname == $user->nickname)
		<a href="{{ url("users/profiles/picture/" . Auth::user()->nickname) }}">
		    <button type="button" class="btn btn-primary btn-block">
				<span class="glyphicon glyphicon-plus"></span> 
				@if($imgPathProfile == 'default/avatar1.png')
					Add Profile Picture
				@else
					Update Profile Picture
				@endif
		    </button>
		</a>
	@endif	
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
		<a class="btn btn-success" href="{{ url("follow/{$user->nickname}") }}">
			<span class="glyphicon glyphicon-star"></span> Follow
		</a>
		<div class="clear"></div>

	</li>
	@endif

	@if((Auth::user()->nickname != $user->nickname) && ($following == true))
	<li class="list-group-item list-group-item-success">
		<a class="btn btn-danger" href="{{ url("unfollow/{$user->nickname}") }}">
			<span class="glyphicon glyphicon-remove"></span> Unfollow
		</a>
		<div class="clear"></div>

	</li>
	@endif
@stop


                        

