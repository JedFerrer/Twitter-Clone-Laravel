@extends('layouts.plain') 

@section('main-content')

	<div class="tweets-container">
		<div class="list-group">
		    <div class="list-group-item">
		        <h4 class="list-group-item-heading" id="result-header">Results for <b>{{$searchKeyValue}}</b></h4>
		    </div>
		    @if($query->count())
			    @foreach($query as $result)
			    <div class="list-following-followers-container">
				    <div class="list-group-item">

		                @if($imgPath = $result->img_path)
		                @else
		                  {{--*/ $imgPath = "default/avatar1.png" /*--}}
		                @endif

				    	<a href="{{URL::to('users/profiles/' . $result->nickname)}}">{{ HTML::image('uploads/' . $imgPath, 'Logo', array('class' => 'picture')) }}</a>
				        <div class="column-right">
				        	<h5 class="list-group-item-heading"><b>{{ link_to("users/profiles/" . $result->nickname, $result->name) }}</b></h5>
                 			<h5 class="list-group-item-heading"><b>{{ link_to("users/profiles/" . $result->nickname, '@' . $result->nickname) }}</b></h5>
                 	
			                  {{--*/ $followedByCurrentUser = false /*--}}
			                  @if (in_array($result->id, $followersIdCollection))
			                      {{--*/ $followedByCurrentUser = true /*--}}
			                      @if($followedByCurrentUser == true)
			                        <p class="light-color">FOLLOWS YOU</p>
			                      @endif
			                  @endif

			                  {{--*/ $followedByCurrentUser2 = false /*--}}
			                  @if (in_array($result->id, $followingIdCollection)) 
			                      {{--*/ $followedByCurrentUser2 = true /*--}}
			                  @endif

			                @if((Auth::user()->id != $result->id) && ($followedByCurrentUser2 != true))
                
			                  <a class="btn btn-success" href="{{ url("follow/{$result->nickname}") }}">
			                      <span class="glyphicon glyphicon-star"></span> Follow
			                  </a>
			                  <div class="clear"></div>

			                @endif

			                @if((Auth::user()->id != $result->id) && ($followedByCurrentUser2 == true))
			               
			                  <a class="btn btn-danger" href="{{ url("unfollow/{$result->nickname}") }}">
			                      <span class="glyphicon glyphicon-remove"></span> Unfollow
			                  </a>
			                  <div class="clear"></div>
			                
			                @endif

				        </div>
	                	<div class="clear"></div>
	                  
				    </div>
	            </div>
				    
			    @endforeach
			    
			@else
			<div class="list-group-item">
				<p>Sorry, we couldn't find any results for this search.<p>
			</div>
		    @endif
		    @yield('loop-content')
		</div>	
	</div>

		
@stop