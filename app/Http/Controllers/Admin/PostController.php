<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Traits\UserImageUpload;
use App\category;
use App\category_post;
use App\post;
use App\post_tag;
use App\tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function __construct(){

    return $this->middleware('auth:admin');

   }
    public function index()
    {
        $posts = post::paginate(2);
        return view('admin.post.index',compact('posts'));
    }

   
    public function create()
    {
        $categorys = category::latest()->get();
        $tags = tag::latest()->get();
        return view('admin.post.create',compact('categorys','tags'));
    }

   
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' =>'required',
            'slug' =>'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'body' =>'required'
        ]);
        
        $posts = new post();


        $posts->user_id = Auth::user()->id;
        $posts->title = $request->title;
        $posts->slug = $request->slug;
        
        $posts->image = $request->file('image');
        $image_name = str_random(20);
        $ext = strtolower($posts->image->getClientOriginalName());
        $image_full_name = $image_name.'.'.$ext;
        $upload_path = 'image/';
        $image_url = $upload_path.$image_full_name;
        $success = $posts->image->move($upload_path,$image_full_name);
        
        $posts->image = $image_url;

        $posts->body = $request->body;
    
        $posts->save();

        $posts->tags()->sync($request->tag);
        
        $posts->categorys()->sync($request->category);
        session()->flash('message','Post insert successfully');
        return redirect()->back();
    }

  
    public function show($id)
    {
        $posts = post::find($id);
        $category_posts = category_post::latest()->get();
        $categorys = category::latest()->get();
        $post_tags = post_tag::latest()->get();
        $tags = tag::latest()->get();
        return view('admin.post.viewpost',compact('posts','categorys','tags','category_posts','post_tags'));
    }

    
    public function edit($id)
    {
        $posts = post::find($id);
        $category_posts = category_post::latest()->get();
        $categorys = category::latest()->get();
        $post_tags = post_tag::latest()->get();
        $tags = tag::latest()->get();
        return view('admin.post.edit',compact('posts','categorys','tags','category_posts','post_tags'));
        
    }

   
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title' =>'required',
            'slug' =>'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'body' =>'required'
        ]);
        
        $posts = post::find($id);

        $posts->user_id = Auth::user()->id;
        $posts->title = $request->title;
        $posts->slug = $request->slug;
        
        $posts->image = $request->file('image');
        $image_name = str_random(20);
        $ext = strtolower($posts->image->getClientOriginalName());
        $image_full_name = $image_name.'.'.$ext;
        $upload_path = 'image/';
        $image_url = $upload_path.$image_full_name;
        $success = $posts->image->move($upload_path,$image_full_name);
        
        $posts->image = $image_url;

        $posts->body = $request->body;
    
        $posts->save();

        $posts->tags()->sync($request->tag);
        $posts->categorys()->sync($request->category);
        session()->flash('message','Post update successfully');
        return redirect()->back();
    }


    public function destroy($id)
    {
        
    }
}
