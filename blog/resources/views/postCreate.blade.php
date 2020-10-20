@extends('layouts.app')

@section('content')

<div class="container">


    <div class="row justify-content-center">
        <div class="col-md-8">
        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
 @if($errors->any())
<div class="alert alert-danger">
 <ul>
  @foreach($errors->all() as $error)
  <li>{{ $error }}</li>
  @endforeach
 </ul>
</div>
@endif

@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif

       
          <div>
                <a class="btn btn-warning" href="{{ route('home') }}"> Back</a>
            </div>
            <br>
            <div class="card">

                <div class="card-header text-dark">Create Post</div>

                <div class="card-body">
     


        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row">
            
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Title:</strong>
                    <input type="text" name="title" class="form-control" value="" placeholder="Title" required>

                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Slug:</strong>
                    <input type="text" name="slug" class="form-control" value="" placeholder="Slug" required>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Description:</strong>
                    <input type="text" name="description" value="" class="form-control" placeholder="Description" required>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Image:</strong>
                    <input type="file" name="featured_image" value="" class="form-control" required>
                </div>
            </div>
           
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>

                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

		