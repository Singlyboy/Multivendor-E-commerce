<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       
        return view('backend.pages.category.index');
        
    }
    public function getCategoryData()
    {
        $data=Category::all();
        return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function(Category $allCategory){
                        $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">View</a>
                                <a href="" class="edit btn btn-success btn-sm">Edit</a>
                                <form action="'.route('category.destroy', $allCategory->id).'" method="POST" style="display:inline;">
                                    '.csrf_field().'
                                    '.method_field('DELETE').'
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>';
                        return $btn;
                    })
                    
                    ->rawColumns(['action'])
                    ->make(true);    
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $allCategory=Category::all();
        return view('backend.pages.category.create',compact('allCategory'));    
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Category::create([
            //bam pase table er column name => dan pase input field er name
            'name'=>$request->cat_name,
            'slug'=>str()->slug($request->cat_name),
            'description'=>$request->cat_description
        ]);

        notify()->success("Category Created Successfully.");
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::find($id); 
                   
        $category->delete();        
    
    return redirect()->back();
    }
}
