
@extends('layouts.app')

@section('content')
   
    
<div>
        <div class="col-md-12">
            <div class="pull-left">
            <h3><center>Post Detail</center></h3>
            </div>
            <div class="pull-right">
                <a class="btn btn-warning" href="{{ route('posts.create') }}"> Back</a>
            </div>
        </div>
    </div>
<br>
    <table class="table table-bordered">
        <tr>
            
            <th>Title</th>
            <th>Slug</th>
            <th>Description</th>
            <th>Feature Image</th>
        </tr>
    
        <tr>
            <td>{{ $detailPost->title }}</td>
            <td>{{ $detailPost->slug }}</td>
            <td>{{ $detailPost->description }}</td>
            <td> 
            
            <img src="{{ asset('images/'.$detailPost->featured_image) }}" height="200px" width:="200px"/>
            </td>
            
        </tr>
    </table>


@endsection