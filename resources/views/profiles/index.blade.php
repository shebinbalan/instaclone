@extends('layouts.app')

@section('content')
<div class="container">
    
   <div class="row">
       <div class="col-3 p-5">
       <img src="/uploads/{{$user->profile->profileImage()}}" alt="profile Pic" height="150" width="150" class="rounded-circle">
       </div>
       <div class="col-9 pt-5">
           <div class="d-flex justify-content-between align-item-baseline">
               <div class="d-flex align-items-center pb-4">
                   <div class><h4>{{$user->username}}</h4></div>
                     <follow-button user-id="{{$user->id}}" follows="{{$follows}}"></follow-button>
               </div>
           @can('update',$user->profile)
           <a href="/p/create">Add new post</a>
           @endcan
           @can('update',$user->profile)
           <a href="/profile/{{$user->id}}/edit">Edit Profile</a>
           @endcan
        </div>
           <div class="d-flex">
               <div style="padding-right: 20px;"><strong>{{ $postCount}}</strong>Posts</div>
               <div style="padding-right: 20px;"><strong>{{$followersCount}}</strong>Followers</div>
               <div style="padding-right: 20px;"><strong>{{$followingCount}}</strong>Following</div>
           </div>
           <div class="pt-4 font-weight-bold">{{$user->profile->title}}</div>
           <div class="pt-0">{{$user->profile->description}}</div>
           <div ><a href="#">{{$user->profile->url}}</a></div>
       </div>
   </div>
   <div class="row pt-5 ">
       @foreach($user->posts as $post)
       <div class="col-4 pb-4">
           <a href="/p/{{$post->id}}">
       <img src="/uploads/{{$post->image}}" class="w-100">
           </a>
       </div>
       @endforeach
      
     
</div>
@endsection
