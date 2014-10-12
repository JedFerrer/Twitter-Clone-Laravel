@extends('layouts.plain') 

@section('main-content')
	
	<div class="up-container">
		@if ($errors->all())
	     	<div class="bg-danger validation-errors">
	        <p>The following errors are encountered</p>
	            <ul>
	            	
					@foreach ($errors->all() as $error)
					    <li>{{ $error }}</li>
					@endforeach

	            </ul>
	        </div>
	    @endif
	   @if (Session::has('message'))
     		<div class="alert alert-success" role="alert">
		    	<p> {{ Session::get('message') }} </p>
		 	</div>
		@endif

		@if (Session::has('errMessage'))
     		<div class="alert alert-danger" role="alert">
		    	<p> {{ Session::get('errMessage') }} </p>
		 	</div>
		@endif
		<div class="col-sm-6 col-md-4" id="header-user-pic2">
	    	<div class="thumbnail">
		        {{ HTML::image("uploads/" . $imgPath, "Logo") }}
			       
			    {{ Form::open(array('url' => 'users/profiles/picture/update/' . Auth::user()->nickname, 'files' => true)) }}
			     	<span class="btn btn-default btn-block btn-file">
						Browse{{ Form::file('image') }}
					</span>
					{{ Form::submit('Upload', array('class' => 'btn btn-success btn-block')) }}
				{{ Form::close() }}
				
	    	</div>
	  	</div>
	  	<div class="clear"></div>
	</div>
@stop