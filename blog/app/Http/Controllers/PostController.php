<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Storage;
use Gate;
use Redirect;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('postCreate');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $allPost = Post::latest()->paginate(5);

        return view('post',compact('allPost'))
            ->with('i', (request()->input('page', 1) - 1) * 6);
         
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        try {
         
        $postdata = new Post();
        $postdata->user_id = auth()->user()->id;
        $postdata->title = $request->title; 
        $postdata->slug = $request->slug; 
        $postdata->description = $request->description; 
        if($request->hasfile('featured_image'))
        {
               $name=$request->file('featured_image')->getClientOriginalName();
               $request->file('featured_image')->move(public_path().'/images/', $name);  
               $data = $name;  
        }

        $postdata->featured_image = $data;
        $postdata->save();

        return redirect()->back()->with('message', 'data save successfully!');
       }
        catch(\Illuminate\Database\QueryException $e){
        $errorCode = $e->errorInfo[1];
        if($errorCode == '1062'){
            return Redirect::back()->withErrors("Slug name already present in database, please insert other name");
        }
        }

    }

    /**
     * Display the specified resource.
     *
     * 
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $detailPost=Post::where('slug',$slug)->first();
        return view('postshow',compact('detailPost'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Gate::allows('isReader')) {
               abort(404,'You are not allowed to this action');
        }
        $PostEditdata=Post::where('id',$id)->first();
        
        return view('editpost',compact('PostEditdata'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
          try{
            $postdataUpdate = Post::find($id);
            $postdataUpdate->user_id = auth()->user()->id;
            $postdataUpdate->title = $request->title; 
            $postdataUpdate->slug = $request->slug; 
            $postdataUpdate->description = $request->description; 
           
            if($request->hasfile('featured_image'))
            {
                $name=$request->file('featured_image')->getClientOriginalName();
                $request->file('featured_image')->move(public_path().'/images/', $name);  
                $data = $name;  
                $postdataUpdate->featured_image = $data;
            }
            
            $postdataUpdate->update();
            return redirect()->back()->with('message', 'Post Updated successfully');
           }
            catch(\Illuminate\Database\QueryException $e){
                $errorCode = $e->errorInfo[1];
                if($errorCode == '1062'){
                    return Redirect::back()->withErrors("Slug name already present in database, please insert other name");
                }
                }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    { 
        $Data=Post::findOrFail($id);
        $file= $Data->featured_image;
        $filename = public_path().'/images/'.$file;
        \File::delete($filename);
        $Data->delete();
        return redirect()->back()->with('message', 'Post deleted successfully');
                     
    }
}
