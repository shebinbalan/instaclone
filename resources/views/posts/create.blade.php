@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/p" enctype="multipart/form-data" method="post">
        @csrf
    <div class="row">
     <div class="col-8 offset-2">
         <div class="row"><h1>Add new post</h1></div>
     <div class="row mb-3">
                            <label for="caption" class="col-md-4 col-form-label text-md-end">Post Caption</label>

                          
                                <input id="caption" 
                                type="caption" 
                                class="form-control @error('caption') is-invalid @enderror" 
                                name="caption"
                                 value="{{ old('caption') }}"
                                 required autocomplete="caption" autofocus>

                                @error('caption')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

             <div class="row">
             <label for="image" class="col-md-4 col-form-label text-md-end">Post Image</label>
                 <input type="file" class="form-control-file" id="image" name="image">
                 @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
             </div>      
             <div class="row pt-3" >
            <button class="btn-primary">Add new post</button>
             </div>        
         </div>
       </div>
    </form>
    
  
</div>
@endsection
