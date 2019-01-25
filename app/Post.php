<?php

namespace App;
 
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
 



class Post extends Model 
{
    //

    use Sluggable;
    use SluggableScopeHelpers;
 
    public function sluggable() {
        return [
            'slug' => [
                'source' => 'title',
                'onUpdate' => true
            ],
        ];
    }
    
        



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

    public function comments(){
        return $this->hasMany('App\Comment');
    }
}
