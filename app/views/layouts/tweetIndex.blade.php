@extends('layouts.plain')

@section('main-content')

	<div class="user-info-container">

		<div class="row">
		    <div class="col-sm-6 col-md-4" id="header-user-pic">
		    	<div class="thumbnail">
			        
			        <a href="{{URL::to('/')}}">{{ HTML::image("uploads/" . $imgPathProfile, "Logo") }}</a>
			        	@yield('add-prof-photo')
			        <div class="caption">
			        	@yield('userInfo')	
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

		
@stop