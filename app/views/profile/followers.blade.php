@extends('profile.default') 

@section('loop-title')
  Followers
@stop

@section('loop-content')

  @if($user->followers->count())
    @foreach($user->followers as $follower)
      <div class="list-following-followers-container">
        <div class="list-group-item">

            @if($imgPath = $follower->followerAuthorInfo->img_path)
            @else
              {{--*/ $imgPath = "default/avatar1.png" /*--}}
            @endif
            
            <a href="{{URL::to('users/profiles/' . $follower->followerAuthorInfo->nickname)}}">{{ HTML::image('uploads/' . $imgPath, 'Logo', array('class' => 'picture')) }}</a>
            <div class="column-right">

              <h5 class="list-group-item-heading"><b>{{ link_to("users/profiles/" . $follower->followerAuthorInfo->nickname, $follower->followerAuthorInfo->name) }}</b></h5>
              <h5 class="list-group-item-heading"><b>{{ link_to("users/profiles/" . $follower->followerAuthorInfo->nickname, '@' . $follower->followerAuthorInfo->nickname) }}</b></h5>
              {{--*/ $followedByCurrentUser = false /*--}}
              @if (in_array($follower->user_id, $followersIdCollection))
                  {{--*/ $followedByCurrentUser = true /*--}}
                  @if($followedByCurrentUser == true)
                    <p class="light-color">FOLLOWS YOU</p>
                  @endif
              @endif

                 {{--*/ $followedByCurrentUser2 = false /*--}}
              @if (in_array($follower->user_id, $followingIdCollection)) 
                  {{--*/ $followedByCurrentUser2 = true /*--}}
              @endif
              
              @if((Auth::user()->id != $follower->user_id) && ($followedByCurrentUser2 != true))
                <a href="{{ url("follow/{$follower->followerAuthorInfo->nickname}") }}">
                  <button type="button" class="btn btn-success">
                    <span class="glyphicon glyphicon-star"></span> Follow
                  </button>
                </a>
                <div class="clear"></div>
              @endif

              @if((Auth::user()->id != $follower->user_id) && ($followedByCurrentUser2 == true))
                <a href="{{ url("unfollow/{$follower->followerAuthorInfo->nickname}") }}">
                  <button type="button" class="btn btn-danger">
                    <span class="glyphicon glyphicon-remove"></span> Unfollow
                  </button>
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
      <p>Unfortunately, there are no followers</p>
    </div>
  @endif

@stop
