<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
</head>
<body>
<div style="margin: 10px 400px 0px 20px">
	
	<h1>{{$post->title}}</h1> <br>
	 @foreach($category as $cate)
  		<a href="{{ route('category',$cate->slug) }}"> {{$cate->slug}} </a>
   
	 @endforeach		
	
        <img src="/{{ $post->image }}" style="height: 250px; width: 400px;">

        <p>{!! htmlspecialchars_decode($post->body) !!}</p>

       
	
	
</div>	
</body>
</html>