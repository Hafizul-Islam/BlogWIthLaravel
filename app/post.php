<?php

namespace App;


use App\category_post;
use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function category_posts()
    {
        return $this->hasMany('App\category_post');
    }

	public function cat()
    {
        return $this->hasManyThrough('App\category');
    }

    public function tags()
    {
    	return $this->belongsToMany('App\tag','post_tags');
    }

    public function categorys()
    {
    	return $this->belongsToMany('App\category','category_posts');
    }
}
