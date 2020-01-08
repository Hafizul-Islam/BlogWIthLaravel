@extends('admin.layout.app')

@section('main-content')
   <div class="app-title">
        <div>
          <h1><i class="fa fa-edit"></i> Form Components</h1>
          <p>Bootstrap default form components</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Forms</li>
          <li class="breadcrumb-item"><a href="#">Form Components</a></li>
        </ul>
      </div>
       <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <table class="table table-hover table-bordered" id="sampleTable">
                <thead>
                  <tr>
                    <th>Id</th>
                    <th>Title</th>
                    <th>Slug</th>
                    <th>Body</th>
                    <th>Insert Time</th>
                    <th>update Time</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($posts as $item)
                 
                  <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->title}}</td>
                    <td><img src="/{{ $item->image }}" style="height: 70px; width: 70px; border-radius: 50%;"></td>
                    <td>{!!str_limit(strip_tags($item->body),$limit=400,$end='.....')!!}
                      <strong><a href="{{route('post.show',$item->id)}}"> Read more</a> </strong>

                    </td>
                    <td>{{ $item->created_at->format('d/m/Y') }}</td>
                    <td>{{ $item->updated_at->format('d/m/Y') }}</td>

                    <td colspan="" rowspan="" headers="">
                      
                      <a href="{{route('post.edit',$item->id)}}">Edit</a>|
                      <a href="" title="">Delete</a>
                    </td>
                  </tr>
                @endforeach
                </tbody>
              </table>
              {{$posts->links()}}
            </div>
          </div>
        </div>
      </div>
@endsection

@section('datatable-js')
   <script type="text/javascript" src="{{ asset('admin/js/plugins/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admin/js/plugins/dataTables.bootstrap.min.js') }}"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>
 @endsection