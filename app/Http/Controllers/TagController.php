<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use Yajra\Datatables\Facades\Datatables;

class TagController extends Controller
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
            return datatables()->of(Tag::latest()->get())
                    ->addColumn('action',function($tag){
                        $button = '<a href="'. route('tag.edit', $tag->id) .'" type="button"
                        name="edit" 
                        class="edit btn btn-primary btn-sm">Edit</a>';
                        $button .= '&nbsp;';
                        $button .='<a href="'. route('tag.destroy', $tag->id) .'" type="button"
                           name="delete" 
                           class="delete btn btn-primary btn-sm">Delete</button>';
                        return $button;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view ('admin.tag.show');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tag.tag');
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
            'name' => 'required|unique:tags',
            'slug' => 'required',
        ]);
        $tag = new Tag;
        $tag->name = $request->input('name');
        $tag->slug = $request->input('slug');
        $tag->save();
        return redirect(route('tag.index'))->
        with('response','Tag created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tag = Tag::where('id',$id)->first();
        return view('admin.tag.edit',compact('tag'));
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
            'name' => 'required|unique:tags',
            'slug' => 'required',
        ]);
        $tag = Tag::find($id);
        $tag->name = $request->input('name');
        $tag->slug = $request->input('slug');
        $tag->save();
        return redirect(route('tag.index'))->
        with('response','Tag updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Tag::where('id',$id)->delete();
        return redirect()->back();
    }
}
