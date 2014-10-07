@extends('layouts.plain') 

@section('main-content')

	

	<div class="tweets-container">
		<div class="list-group">
		    <div class="list-group-item">
		        <h4 class="list-group-item-heading" id="result-header">Results for <b>{{$searchKeyValue}}</b></h4>
		    </div>
		    @foreach($query as $result)
		    <div class="list-following-followers-container">
			    <a href="#" class="list-group-item">
			    	{{ HTML::image('img/avatar1.png', 'Logo', array('class' => 'picture')) }}
			        <div class="column-right">
			        	<h4 class="list-group-item-heading">{{$result->name}}</h4>
			        	<h5 class="list-group-item-heading">{{'@' . $result->nickname}}</h5>
			        </div>
                	<div class="clear"></div>
                  
			    </a>
            </div>
			    
		    @endforeach
		    @yield('loop-content')
		</div>	
	</div>

		
@stop