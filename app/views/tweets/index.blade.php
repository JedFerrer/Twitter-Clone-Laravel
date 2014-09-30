@extends('layouts.default') 
@section('link-top-left')
	<p class="navbar-text"><span class="glyphicon glyphicon-home"></span> {{ link_to("logout", 'Home') }} </p>
	<p class="navbar-text"><span class="glyphicon glyphicon-user"></span> {{ link_to("logout", 'Profile') }} </p>
@stop

@section('link-top-right')
	@if(Auth::user())
        <p> {{ link_to("logout", 'Log out') }} </p> 
    @endif
@stop
@section('content')
				
	<div class="blog-container">
	    <div>
	        <div class="textbox-wrapper">
	        	<p> {{ $message }} </p>

	        	{{ link_to("/", Auth::user()->name) }}
	        </div>
	    </div>
	</div>	

@stop	
                        

