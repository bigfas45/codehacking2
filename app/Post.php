<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $fillable = [


        'category_id',
        'photo_id',
        'title',
        'body'


    ];

    public function user(){
        return $this->belongsTO('App\User');
    }


    public function photo(){
        return $this->belongsTO('App\Photo');
    }

    
    public function category(){
        return $this->belongsTO('App\Category');
    }
}
