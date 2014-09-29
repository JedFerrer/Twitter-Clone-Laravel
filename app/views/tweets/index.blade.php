@extends('layouts.default')                
@section('link-top-right')
	@if(Auth::user())
        <p> {{ link_to("logout", 'Log out') }} </p> 
    @endif
@stop



                        

@section('content')
	<p> {{ $message }} </p>
@stop