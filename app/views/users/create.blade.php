@extends('layouts.default')
@section('content')
	 <div class="form-container">

        {{ Form::open(['url' => 'user']) }}

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

			<div class="form-header-top-container">
        		<h3><strong>User Login</strong></h3>
	     	</div>

            <div class="form-group">
            	{{ Form::label('email', 'E-mail address:') }}
	 			{{ Form::email('email', $value = null, array('placeholder' => 'E-mail Address', 'class' => 'form-control')) }}
            </div>

            <div class="form-group">
            	{{ Form::label('password', 'Password:') }}
	 			{{ Form::password('password', array('placeholder' => 'Password', 'class' => 'form-control')) }}
            </div>

            {{ Form::submit('Sign In', array('class' => 'btn btn-success')) }}
            </br></br> 
            <p>New to this? {{ link_to("signup", 'Sign Up now') }} </p>


        {{ Form::close() }}

    </div>
@stop