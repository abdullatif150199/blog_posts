<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;

class admindCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // if(auth()->guest()) {
        //     abort(403);
        // }

        // if(auth()->user()->username !== 'latif') {
        //     abort(403);
        // }

        // if(auth()->guest() || auth()->user()->username = 'latif') {
        //     abort(403);
        // }

        return view('dashboard.categories.index', [
            'categories' => category::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request -> validate([
            'name' => 'required|max:255',
            'slug' => 'required|unique:categories',
        ]);


        category::create($validatedData);

        return redirect('/dashboard/categories')->with('success', 'New Categories Has Been Added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(category $category)
    {
        
     
        return view('dashboard.categories.edit', [
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, category $category)
    {
        $rules =[
            'name' => 'required|max:255',
        ];
        if($request->slug != $category->slug) {
            $rules['slug'] = 'required|unique:posts';
        }

        $validatedData = $request->validate($rules);

        category::where('id', $category->id)
        ->update($validatedData);

        return redirect('/dashboard/categories')->with('success', 'category Has Been Edited!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(category $category)
    {
        category::destroy($category->id);

        return redirect('/dashboard/categories')->with('success', 'Categories Has Been Deleted!');
    }
}
