<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'text',
        'author',
    ];

    public function comments(){
        return $this->hasMany(Comment::class,'post_id','id');
    }
    /*
    public function author(){//TODO test this
        return $this->belongsTo(User::class,'user_id','id');
    }*/

}
