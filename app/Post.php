<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Tag;

class Post extends Model
{
    use SoftDeletes;

    protected $fillable = ['title','img','category_id','content','slug','user_id'];

    public function getFeaturedAttribute($img)
    {
        return asset($img);
    }

    protected $dates = ['deleted_at'];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
