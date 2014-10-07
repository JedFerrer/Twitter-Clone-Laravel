@extends('layouts.default')
@section('link-top-left')
	<p class="navbar-text"><span class="glyphicon glyphicon-home"></span> {{ link_to("/", 'Home') }} </p>
	<p class="navbar-text"><span class="glyphicon glyphicon-user"></span> {{ link_to("users/profiles/".Auth::user()->nickname, 'Profile') }} </p>
@stop

@section('link-top-right')
	@if(Auth::user())
        <div class="input-group" id="search-bar">
			<span class="input-group-addon"><span class="glyphicon glyphicon-search"></span></span>

			{{ Form::open(array('url' => 'users/search', 'method' => 'get')) }}
			{{ Form::text('q', $value = null, array('placeholder' => 'Search Twitter', 'class'=> 'form-control', 'maxlength'=> '20', 'required'=> 'required')) }}
			{{ Form::close() }}
	    </div><!-- /input-group -->
        <p> {{ link_to("logout", 'Log out') }} </p> 
    @endif
@stop
@section('content')

	<div class="blog-container">
        <div class="textbox-wrapper">
        	@yield('main-content')

		</div>
	</div>	
@stop