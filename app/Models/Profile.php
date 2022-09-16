<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function profileImage(){
        $imagepath = ($this->image) ? $this->image : '/profile/AMsM3CBtAhjA5RGMNPpevGTUF5BXIOjt80h5kvzd.png';
        return '/storage/'. $imagepath;
    }
    public function followers()
    {
        return $this->belongsToMany(User::class);
    }  

    public function user(){
        return $this->belongsTo(User::class);
    }
}
