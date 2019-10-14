<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Post;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Validator;
use URL;
use Yajra\Datatables\Facades\Datatables;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->ajax())
        {
            return datatables()->of(Post::latest()->get())
                    ->addColumn('action',function($post){
                        $button = '<a type="button" href="'. route('post.edit', $post->id) .'"
                        name="edit" 
                        class="edit btn btn-primary btn-sm">Edit</a>';
                        $button .= '&nbsp;';
                        $button .='<a type="button"
                           name="delete" href="'. route('post.destroy', $post->id) .'"
                           class="delete btn btn-primary btn-sm">Delete</a>';
                        return $button;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        $posts = Post::all();
        return view ('admin.post.show', compact('posts'));
    }
    //public function getdatatable()
    //{
    //    return Datatables::of(Post::get())->make(true);
    //}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.post.post');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|unique:posts|max:255',
            'subtitle'=>'required',
            //'slug' => 'required',
            'body' => 'required',
            'image'=> 'required'
        ]);
        $post = new Post;
        $post->user_id = Sentinel::getUser()->id;
        $post->title = $request->input('title');
        $post->subtitle = $request->input('subtitle');
       // $post->slug = $request->input('slug');
        $post->body = $request->input('body');
        
        if(Input::hasFile('image'))
        {
          $file = Input::file('image');
          $file->move(public_path(). '/posts/',
          $file->getClientOriginalName());
          $url = URL::to("/") . '/posts/' . $file->getClientOriginalName();
        }
        $post->image = $url;
        $post->publish_date=$request->input('publish_date');
        $post->save();
        return redirect(route('post.index'))->
        with('success','Post created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::where('id',$id)->first();
        return view('admin.post.edit',compact('post'));
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
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'subtitle'=>'required',
            'slug' => 'required',
            'body' => 'required',
            'image'=> 'required',
            
        ]);
        $post = Post::find($id);
        $post->user_id = Sentinel::getUser()->id;
        $post->title = $request->input('title');
        $post->subtitle = $request->input('subtitle');
        $post->slug = $request->input('slug');
        $post->body = $request->input('body');
        
        if(Input::hasFile('image'))
        {
          $file = Input::file('image');
          $file->move(public_path(). '/posts/',
          $file->getClientOriginalName());
          $url = URL::to("/") . '/posts/' . $file->getClientOriginalName();
        }
        $post->image = $url;
        $post->publish_date=$request->input('publish_date');
        $post->save();

        return redirect(route('post.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::where('id',$id)->delete();
        return redirect()->back();
    }

}