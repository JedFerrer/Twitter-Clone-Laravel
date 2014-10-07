@extends('layouts.default')
@section('link-top-left')
	<p class="navbar-text"><span class="glyphicon glyphicon-home"></span> {{ link_to("/", 'Home') }} </p>
	<p class="navbar-text"><span class="glyphicon glyphicon-user"></span> {{ link_to("users/profiles/".Auth::user()->nickname, 'Profile') }} </p>
@stop

@section('link-top-right')
	@if(Auth::user())
        <p> {{ link_to("logout", 'Log out') }} </p> 
    @endif
@stop
@section('content')

	<div class="blog-container">
        <div class="textbox-wrapper">
        	<div class="user-info-container">

        		<div class="row">
				    <div class="col-sm-6 col-md-4" id="header-user-pic">
				    	<div class="thumbnail">
					        <a href="{{URL::to('/')}}">{{ HTML::image("img/avatar1.png", "Logo") }}</a>
					        <div class="caption">
					        	<p class="user-name">@yield('userInfo')</p>
					        	<h5 class="nickname">@yield('userNameLink')</h5>
					     	</div>
				    	</div>
				  	</div>

				  	<ul class="list-group" id="header-user-info">
					  	@yield('formToTweetAndInfos')
					</ul>
					<div class="clear"></div>
				</div>
			</div>

			<div class="tweets-container">
				<div class="list-group">
				    <div class="list-group-item">
				        <h4 class="list-group-item-heading">@yield('loop-title')</h4>
				    </div>
				    @yield('loop-content')
				</div>	
			</div>

		</div>
	</div>	
@stop