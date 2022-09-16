<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = auth()->user()->following()->pluck('profiles.user_id');
        $posts = Post::whereIn('user_id',$users)->get();
        dd($posts);
        //return view('posts.create');
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $data =request()->validate([
            'caption'=> 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000',
        ]);
        $imagepath = time().'.'.$request->image->extension();  


        $request->image->move(public_path('uploads'), $imagepath);

        auth()->user()->posts()->create([
            'caption'=>$data['caption'],
            'image'=>$imagepath,
        ]);
         return redirect('/profile/'.auth()->user()->id);
            // dd(request()->all());
          //  Post::create($data);
    }
    public function show(\App\Models\Post $post)
    {
      return view('posts.show',compact('post'));
    }
}
