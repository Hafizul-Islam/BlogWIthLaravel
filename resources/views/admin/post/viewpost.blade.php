@extends('admin.layout.app')

@section('main-content')

<div class="container">
	<div>
		<h1>{{$posts->title}}</h1><br>
		<h4>{{Auth::user()->name}}</h4>
		<img src="/{{$posts->image}}" alt="" style="height:200px;width=200px">
		@foreach($category_posts as $catpost)
			@if($catpost->post_id==$posts->id)
				@foreach($categorys as $cat)
				 	@if($catpost->category_id==$cat->id)
				 	<h4>{{$cat->name}}</h4>
				 	@endif
				@endforeach
			@endif
		@endforeach

		<p>{{$posts->body}}</p>

		@foreach($post_tags as $post_tag)
			@if($post_tag->post_id==$posts->id)
				@foreach($tags as $tag)
				 	@if($tag->id==$post_tag->tag_id)
				 	<small>{{$tag->name}}</small>
				 	@endif
				@endforeach
			@endif
		@endforeach


	</div>
	
	
</div>

@endsection