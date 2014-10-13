@extends('profile.default') 

@section('site-title')
	{{$user->name}} ({{'@'.$user->nickname}})
@stop

@section('loop-title')
	Tweets
@stop

@section('loop-content')

	@if($user->tweets->count())

	    @foreach($user->tweets as $tweet)
        	<div class="list-group-item">

    			<h5 class="list-group-item-heading"><b>{{ link_to("users/profiles/".$user->nickname, $user->name . '&nbsp;&nbsp;@' . $user->nickname) }}</b><span class="dateformated">{{$tweet->created_at }}</span></h5>
    			<p class="list-group-item-text">{{ $tweet->tweet }}</p>

    			@if($user->id == Auth::user()->id)
	    			<a class="btn btn-default btn-xs" id="delete-tweet-btn" href="{{ url("tweet/delete/{$tweet->id}") }}">
						<span class="glyphicon glyphicon-remove"></span>
					</a>
				@endif
  			</div>
  		@endforeach
  		<div style="text-align: center; background: #fff;">
			{{ $user->tweets->links() }}
		</div>
	@else
		<div class="list-group-item">
			<p>Unfortunately, there are no Tweets to show.</p>
		</div>
	@endif
	



@stop
