<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProfilesController extends Controller
{
    public function index(User $user)
    {
      $follows = (auth()->user()) ? auth()->user()->following->contains($user->id): false;
       //dd( $follows);
      // $user=User::findorFail($user);
      $postCount =$user->posts->count();
      $followingCount =$user->following->count();
      $followersCount =$user->profile->followers->count();
        return view('profiles.index',compact('user','follows','postCount','followingCount','followersCount'));
    }

    public function edit(User $user)
    {
            $this->authorize('update',$user->profile);

            return view ('profiles.edit',compact('user'));
    }
    public function update(User $user)
    {
      $this->authorize('update',$user->profile);

      $data =request()->validate([
        'title'=> 'required',
        'description'=>'required',
        'url'=> 'url',
        'image' => '',
    ]);
   
    if(request('image'))
    {
      $imagepath = request('image')->store('profiles','public');
      $image = Image::make(public_path("'uploads/'{$imagepath}"))->fit(1000,1000);
      $image->save();
      $imageArray =['image'=>$imagepath];
    }
    // dd(array_merge($data,['image'=>$imagepath],));
   
    auth()->user()->profile->update(array_merge(
      $data,
      $imageArray ?? []
    ));

    return redirect("/profile/{$user->id}");
    }
}
