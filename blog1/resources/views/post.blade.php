
@extends('layouts.app')

@section('content')
    

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="col-md-12">
            <div class="pull-left">
            <h3><center> View Post</center></h3>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('home') }}"> Back</a>
            </div>
        </div>
    </div>
<br>
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Title</th>
            <th>Slug</th>
            <th>Description</th>
            <th>Feature Image</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($allPost as $item)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $item->title }}</td>
            <td>{{ $item->slug }}</td>
            <td>{{ $item->description }}</td>
            <td> 
            
            <img src="{{ asset('images/'.$item->featured_image) }}" height="40px" />
            </td>
            <td>
                <form action="{{ route('posts.destroy',$item->id) }}" method="POST">

                    <a class="btn btn-info" href="{{ route('posts.show',$item->slug) }}">Show</a>

                    <a class="btn btn-primary" href="{{ route('posts.edit',$item->id) }}">Edit</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    {!! $allPost->links() !!}

@endsection