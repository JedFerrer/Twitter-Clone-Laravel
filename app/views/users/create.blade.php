@extends('layouts.default')
@section('content')
	 <div class="form-container">
       <!--  <form method="post"  role="form" action=""> -->
        {{ Form::open(['url' => 'user']) }}
            <div class="form-group">
                <!-- <label for="exampleInputEmail1">Email address</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" value="" placeholder="Enter your Email" > -->
            	{{ Form::label('email', 'E-mail address:') }}
	 			{{ Form::email('email', $value = null, array('placeholder' => 'E-mail Address', 'class' => 'form-control')) }}
            </div>
            <div class="form-group">
                <!-- <label for="exampleInputPassword1">Password</label>
                <input type="password" name="pass" class="form-control" id="exampleInputPassword1" placeholder="Password" > -->
            	{{ Form::label('password', 'Password:') }}
	 			{{ Form::password('password', array('placeholder' => 'Password', 'class' => 'form-control')) }}
            </div>
            <!-- <button type="submit" class="btn btn-primary">Sign In</button> -->
            {{ Form::submit('Sign In', array('class' => 'btn btn-primary')) }}
            </br></br> 
            <p>New to this? <a href="#">Sign Up now</a></p>

        {{ Form::close() }}
       <!--  </form> -->
    </div>
@stop