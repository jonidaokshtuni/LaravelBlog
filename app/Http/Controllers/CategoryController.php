<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Yajra\Datatables\Facades\Datatables;

class CategoryController extends Controller
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
            return datatables()->of(Category::latest()->get())
                    ->addColumn('action',function($category){
                        $button = '<a type="button"
                        name="edit"  href="'. route('category.edit', $category->id) .'"
                        class="edit btn btn-primary btn-sm">Edit</a>';
                        $button .= '&nbsp;';
                        $button .='<a type="button"
                           name="delete"  href="'. route('category.destroy', $category->id) .'"
                           class="delete btn btn-primary btn-sm">Delete</a>';
                        return $button;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view ('admin.category.show');
    }
   // public function get_datatable()
   // {
   //     return Datatables::of(Category::get())->make(true);
   // }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.category');
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
            'name' => 'required|unique:categories',
            'slug' => 'required',
        ]);
        $category = new Category;
        $category->name = $request->input('name');
        $category->slug = $request->input('slug');
        $category->save();
        return redirect(route('category.index'))->
        with('response','Category created successfully');
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
       
        $category = Category::where('id',$id)->first();
        return view('admin.category.edit',compact('category'));
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
            'name' => 'required',
            'slug' => 'required',
        ]);
        $category = Category::find($id);
        $category->name = $request->input('name');
        $category->slug = $request->input('slug');
        $category->save();
        return redirect(route('category.index'))->
        with('response','Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::where('id',$id)->delete();
        return redirect()->back();
    }
}
