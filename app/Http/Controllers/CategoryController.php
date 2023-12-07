<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=Category::orderBy('order','asc')->get();
        return view('dashboard.category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
        ]);
        $category=Category::orderBy('order','desc')->first();
        if($category){
            $order=$category->order+1;
        }else{
            $order=1;
        }
        $slug = Str::slug($request->name);
        if (Category::where('slug', $slug)->first()) {
            $slug = $slug . '-' . $category->id;
        }
        Category::create([
            'name'=>$request->name,
            'slug'=>$slug,
            'order'=>$order,
        ]);
        return back()->with('success','Category add successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name'=>'required',
        ]);
        $category->update([
            'name'=>$request->name,
        ]);
        return back()->with('success','Category update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return back()->with('success','Category Delete successfully');
    }
    public function drop(Request $request)  {
        try {
            $input = $request->all();
    
            if (!empty($input['pending'])) {
                foreach ($input['pending'] as $key => $value) {
                    $key = $key + 1;
                    Category::where('id', $value)
                            ->update([
                                'order' => $key
                            ]);
                }
            }
    
            return response()->json(['message' => 'Success'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
