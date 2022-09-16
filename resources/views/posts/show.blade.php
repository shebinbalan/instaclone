@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-8">
             <img src="/uploads/{{$post->image}}" class="w-100">
        </div>
        <div class="col-4">
            <div  class="d-flex align-items-center">
                <div style="padding-right: 10px;">
                <!-- <img src="{{$post->user->profile->profileImage()}}" class="rounded-circle w-100" style="max-width: 50px;"> -->
            </div>
            <div>
                <div class="font-weight-bold"><a href="/profile/{{$post->user->id}}"><span class="text-dark">{{$post->user->username}}</a></span>
            <a href="" style="padding-left: 10px;">Follow</a>
            </div>
            </div>
        </div>
           <hr>
            <p><span class="font-weight-bold"><a href="/profile/{{$post->user->id}}"><span class="text-dark">{{$post->user->username}}</a></span></span>{{$post->caption}}</p>
        </div>

    </div>
</div>
@endsection
