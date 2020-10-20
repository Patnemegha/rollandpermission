
@extends('layouts.app')

@section('content')
    

    @if($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="col-md-12">
            <div class="pull-left">
            <h3><center> Edit Post</center></h3>
            </div>
            <div class="pull-right">
                <a class="btn btn-warning" href="{{ route('home') }}"> Back</a>
            </div>
        </div>
    </div>
<br>

    <form action="{{ route('posts.update',$PostEditdata->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
            
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Title:</strong>
                    <input type="text" name="title" class="form-control" value="{{$PostEditdata->title}}" placeholder="Title" required>

                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Slug:</strong>
                    <input type="text" name="slug" class="form-control" value="{{$PostEditdata->slug}}" placeholder="Slug" required>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Description:</strong>
                    <input type="text" name="description" value="{{$PostEditdata->description}}" class="form-control" placeholder="Description" required>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Image:</strong>
                    <input type="file" name="featured_image" value="" class="form-control"><br/>
                    <img src="{{ asset('images/'.$PostEditdata->featured_image) }}" height="100px" />
                </div>
            </div>
           
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>

  

@endsection