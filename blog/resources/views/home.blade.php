
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
            




<div class="container-fluid">
   <div class="col-sm-12 text-center">
   @can('isAdmin')
           
               <a  class="btn btn-warning" href="{{ route('posts.index') }}"> Create Post</a>
            
   @endcan
   @can('isAdmin')
           
        
                <a class="btn btn-warning" href="{{ route('posts.create') }}"> View Post</a>
          
     
      @elsecan('isEditor') 
      
     
                <a class="btn btn-warning" href="{{ route('posts.create') }}"> View Post</a>
           
  
       @elsecan('isReader')
       
                <a class="btn btn-warning" href="{{ route('posts.create') }}"> View Post</a>
           
     
       @endcan
   </div>
</div>
           
</div>
@endsection




