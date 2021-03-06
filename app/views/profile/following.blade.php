@extends('profile.default') 

@section('site-title')
  People followed by {{$user->name}})
@stop

@section('loop-title')
  Following
@stop

@section('loop-content')

    @if($user->following->count())
        @foreach($user->following as $following)
          <div class="list-following-followers-container">
              <div class="list-group-item">

                  @if($imgPath = $following->followingAuthorInfo->img_path)
                  @else
                    {{--*/ $imgPath = "default/avatar1.png" /*--}}
                  @endif

                  <a href="{{URL::to('users/profiles/' . $following->followingAuthorInfo->nickname)}}">{{ HTML::image('uploads/' . $imgPath, 'Logo', array('class' => 'picture')) }}</a>
                  <div class="column-right">
                      <h5 class="list-group-item-heading"><b>{{ link_to("users/profiles/" . $following->followingAuthorInfo->nickname, $following->followingAuthorInfo->name) }}</b></h5>
                      <h5 class="list-group-item-heading"><b>{{ link_to("users/profiles/" . $following->followingAuthorInfo->nickname, '@' . $following->followingAuthorInfo->nickname) }}</b></h5>

                      {{--*/ $followedByCurrentUser = false /*--}}
                      @if (in_array($following->following_id, $followersIdCollection))
                          {{--*/ $followedByCurrentUser = true /*--}}
                          @if($followedByCurrentUser == true)
                            <p class="light-color">FOLLOWS YOU</p>
                          @endif
                      @endif

                      {{--*/ $followedByCurrentUser2 = false /*--}}
                      @if (in_array($following->following_id, $followingIdCollection)) 
                          {{--*/ $followedByCurrentUser2 = true /*--}}
                      @endif

                      @if((Auth::user()->id != $following->following_id) && ($followedByCurrentUser2 != true))
                        <a class="btn btn-success" href="{{ url("follow/{$following->followingAuthorInfo->nickname}") }}">
                            <span class="glyphicon glyphicon-star"></span> Follow
                        </a>
                        <div class="clear"></div>
                      @endif
                      
                      @if((Auth::user()->id != $following->following_id) && ($followedByCurrentUser2 == true))
                        <a class="btn btn-danger" href="{{ url("unfollow/{$following->followingAuthorInfo->nickname}") }}">
                            <span class="glyphicon glyphicon-remove"></span> Unfollow
                        </a>
                        <div class="clear"></div>
                      @endif

                  </div>
                  <div class="clear"></div>
              </div>
          </div>
    		@endforeach

      <div style="text-align: center; background: #fff;">
          {{ $user->following->links() }}
      </div>
    @else
      <div class="list-group-item">
          <p>Unfortunately, there are no users followed</p>
      </div>
    @endif
  	

@stop
