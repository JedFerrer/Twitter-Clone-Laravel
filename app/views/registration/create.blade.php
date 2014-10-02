@extends('layouts.default')

@section('link-top-left')
	<h5>Twitter Clone</h5>
@stop

@section('link-top-right')
        <p> {{ link_to("login", 'Sign In') }} </p> 
@stop

@section('content')
	<div class="form-container2">
		<div class="form-header-top-container">
        	<h2><strong>Sign Up</strong></h2>
     	</div>

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

		{{ Form::open(['url' => 'users']) }}

			<div class="form-group">
				{{ Form::label('name', 'Full Name:') }}
				{{ Form::text('name', $value = null, array('placeholder' => 'Name', 'class'=> 'form-control', 'autofocus' => 'autofocus' )) }}
	 			
	 		</div>

	 		<div class="form-group">
				{{ Form::label('nickname', 'Nickname:') }}
				{{ Form::text('nickname', $value = null, array('placeholder' => 'Nickname', 'class'=> 'form-control', 'maxlength'=> '10' )) }}
	 			
	 		</div>

	 		<div class="form-group">
	 			{{ Form::label('email', 'E-mail address:') }}
	 			{{ Form::email('email', $value = null, array('placeholder' => 'E-mail Address', 'class' => 'form-control')) }}
				
			</div>

			<div class="form-group">
	 			{{ Form::label('password', 'Password:') }}
	 			{{ Form::password('password', array('placeholder' => 'Password', 'class' => 'form-control')) }}
				
			</div>

			<div class="form-group">
	 			{{ Form::label('rpass', 'Re-enter Password:') }}
	 			{{ Form::password('rpass', array('placeholder' => 'Repeat Password', 'class' => 'form-control')) }}
				
			</div>

			{{ Form::submit('Sign Up', array('class' => 'btn btn-success')) }}

		{{ Form::close() }}
	</div>

@stop