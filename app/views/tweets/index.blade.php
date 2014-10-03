@extends('layouts.tweetIndex') 

@section('userInfo')
	<p class="user-name">{{ link_to("users/profiles/".Auth::user()->nickname, Auth::user()->name) }}</p>
	<h5 class="nickname">{{ link_to("users/profiles/".Auth::user()->nickname, '@'.Auth::user()->nickname) }}</h5>
@stop

@section('formToTweet')
	@if ($errors->all())
	  	<li class="list-group-item">
	     	<div class="alert alert-danger" role="alert">
	            <ul>
					@foreach ($errors->all() as $error)
					    <p>{{ $error }}</p>
					@endforeach		      
	            </ul>
	        </div>
	  	</li>
  	@endif
  	{{ Form::open(['url' => 'tweet']) }}
	  	<li class="list-group-item list-group-item-success">{{ Form::text('tweet', $value = null, array('placeholder' => 'Compose new Tweet...', 'class'=> 'form-control', 'maxlength'=> '140', 'required'=> 'required')) }}</li>
	  	<li class="list-group-item list-group-item-success">{{ Form::submit('Tweet', array('class' => 'btn btn-success')) }}<div class="clear"></div></li>
	{{ Form::close() }}
@stop

@section('tweets')
	@if($posts->count())
	    @foreach($posts as $post)
        	<a href="{{ url('users/profiles/'.$post->author->nickname) }}" class="list-group-item">
    			<h5 class="list-group-item-heading"><b>{{ $post->author->name }}</b>&nbsp;&nbsp;<span>@</span><span>{{ $post->author->nickname }}</span></h5>
    			<p class="list-group-item-text">{{ $post->tweet }}</p>
  			</a>
  		@endforeach
	@else
		<p>Unfortunately, there are no Posts to show.</p>
	@endif
@stop
