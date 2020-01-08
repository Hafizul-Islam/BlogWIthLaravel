@extends('admin.layout.app')

@section('editor-css')
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.css">

    <!-- Include Editor style. -->
    <link href="https://cdn.jsdelivr.net/npm/froala-editor@2.9.5/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/froala-editor@2.9.5/css/froala_style.min.css" rel="stylesheet" type="text/css" />
 @endsection
 

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
    @if(session()->has('message'))
      <h4 class="alert alert-success">{{session()->get('message')}}</h4>
    @endif
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="row">
              <div class="col-lg-12">
                <form  method="post" action="{{route("post.update",$posts->id)}}" enctype="multipart/form-data">
                    {{csrf_field()}}
                    {{method_field("PATCH")}}
                  <div class="form-group">
                    <label for="exampleInputEmail1">Post Title</label>
                    <input class="form-control" id="exampleInputEmail1" type="text"aria-describedby="emailHelp" name="title" value="{{$posts->title}}">
                  </div>


                  <div class="form-group">
                    <label for="exampleInputPassword1">Post slug</label>
                    <input class="form-control" id="exampleInputPassword1" 
                    name="slug"type="text" value="{{$posts->slug}}">
                  </div>
                
                <div class="form-group">
                    <label for="exampleInputEmail1">Select Category</label>
                      <select class="form-control" id="demoSelect2" multiple="" name="category[]">
                        <optgroup >
                          @foreach($categorys as $cat)
                          <option value="{{$cat->id}}"
                            @foreach($category_posts as $catpost)
                              @if($catpost->post_id==$posts->id)
                                 @if($catpost->category_id==$cat->id)
                                  {{'selected= "selected" '}}
                                 @endif
                              @endif
                            @endforeach>
                            {{$cat->name}}
                          </option>
                          @endforeach
                        </optgroup>
                      </select>
                    </div>
         
             
                    <div class="form-group">
                    <label for="exampleInputEmail1">Select tag</label>
                      <select class="form-control" id="demoSelect" multiple="" name="tag[]">
                        <optgroup>
                          @foreach($tags as $tag)
                          <option value="{{$tag->id}}"
                            @foreach($post_tags as $post_tag)
                              @if($post_tag->post_id==$posts->id)
                                 @if($post_tag->tag_id==$tag->id)
                                  {{'selected= "selected" '}}
                                 @endif
                              @endif
                            @endforeach>
                            {{$tag->name}}
                          </option>
                          @endforeach
                        </optgroup>
                      </select>
                    </div>
              
                
                  <div class="form-group">
                    <label for="exampleInputFile">Image Upload</label>
                    <input class="form-control-file" id="exampleInputFile" type="file" aria-describedby="fileHelp" name="image">
                  </div>
                

                   <div class="form-group">
                    <label for="exampleInputFile">Post Body</label>
                    <textarea name="body" style="height:600px" >
                      {{$posts->body}}
                    </textarea>
                  </div>
                   
                   <div class="tile-footer">
              <input type="submit" value="Submit" class="btn btn-primary"></input>
            </div>

            </form>
      
              </div>
           
            </div>
            
          </div>
        </div>
      </div>

@endsection

@section('multi-select-js')
     <script type="text/javascript" src="{{ asset('admin/js/plugins/select2.min.js') }}"></script>
    <script type="text/javascript">
      $('#demoSelect').select2();
    </script>
    <script type="text/javascript">
      $('#demoSelect2').select2();
    </script>
 @endsection

 @section('editor-js')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/mode/xml/xml.min.js"></script>

    <!-- Include Editor JS files. -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/froala-editor@2.9.5/js/froala_editor.pkgd.min.js"></script>

    <!-- Initialize the editor. -->
    <script> $(function() { $('textarea').froalaEditor() }); </script>
 @endsection