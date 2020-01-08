<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
</head>
<body>
	<div style="margin: 50px">


		@foreach ( $posts as $item)
                 
                    <h1>{{$item->title}}</h1>

                    <img src="/{{ $item->image }}" style="height: 70px; width: 200px; border-radius: 20%;">

                    <p>{!!str_limit(strip_tags($item->body),$limit=400,$end='.....')!!}
                      <strong><a href="{{route('post',$item->slug)}}"> Read more</a> </strong>

                    </p>
                    
        @endforeach

	</div>
</body>
</html>