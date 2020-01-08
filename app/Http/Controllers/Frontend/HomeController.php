<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\category;
use App\post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function homePage()
    {
    	$posts = post::paginate(3);
    	return view('frontend.frontendHome',compact('posts'));
    }
    public function singleViewPost(post $post)
    {

    	$category = $post->categorys;
    	
    	//return $category;
    	//$category = post::with('categorys')->get();
    	//return $category->pivot->post_id;

    	return view('frontend.singleview',compact('post','category'));
    }

    public function allCategoryView(category $category)
    {
    	//return $category;
    	$posts = $category->posts;
    	//return $posts;
    	return view('frontend.allcategory',compact('posts'));
    }
}
