<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $query = category::query();

         if ($search = $request->search) {
        $query->where('name', 'ILIKE', "%{$search}%")
              ->orWhere('information', 'ILIKE', "%{$search}%");
    }

        $categories =$query->paginate(10);
        return view('category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

    // dd($request->all());

        $data = $request->validate([
            'name'=> 'required|string|max:100',
            'information'=> 'string|max:255',
        ]);

        category::create($data);
        return redirect()->route('category.index')->with('success', 'Category created successfully.');
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
    public function edit(category $category)
    {
        return view('category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, category $category)
    {
        $data = $request->validate([
            'name'=>'required|string|max:100',
            'information'=> 'string|max:255',
        ]);

        $category->update($data);
        return redirect()->route('category.index')->with('success','category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(category $category)
    {
        $category->delete();
        return redirect()->route('category.index')->with('success', 'category deleted successfully');
    }
}
