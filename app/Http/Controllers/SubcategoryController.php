<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subcategory;
use App\Models\Category;
use App\Models\Image;


use Validator;

class SubcategoryController extends Controller
{
    public function index()
{
    $subcategories = Subcategory::with('image')->get();
    return view('dashboard.subcategories.index', compact('subcategories'));
}
    public function create()
    {
        $categories = Category::all(); 
        $images = Image::all(); 
        return view('dashboard.subcategories.create', compact('categories', 'images'));
    }

public function store(Request $request)
{
 $request->validate([
         'subcategoryName' => 'required|max:255',
         'categoryID' => 'required|exists:category,categoryID',
         'imageID' => 'required|exists:image,imageID' 
     ]);
    
    $subcategory = new Subcategory(); 
    $subcategory->subcategoryName = $request->subcategoryName;
    $subcategory->categoryID = $request->categoryID;
    $subcategory->imageID = $request->imageID; 
    $subcategory->save(); 

    return redirect('/dashboard/subcategories')->with('success', 'Subcategory created successfully.');
}
    public function edit($id)
{
    $subcategory = Subcategory::findOrFail($id);
    $categories = Category::all(); 
    $images = Image::all(); 
    return view('dashboard.subcategories.edit', compact('subcategory', 'categories', 'images'));
}
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'subcategoryName' => 'required|max:255',
            'categoryID' => 'required|exists:category,categoryID',
            'imageID' => 'nullable|exists:image,imageID'
        ]);

        $subcategory = Subcategory::findOrFail($id);
        
        $subcategory->update($validatedData);

        return redirect('/dashboard/subcategories')->with('success', 'Subcategory updated successfully.');
    }


    public function destroy($id)
    {
        $subcategory = Subcategory::findOrFail($id);
        $subcategory->delete();

        return redirect('/dashboard/subcategories')->with('success', 'Subcategory deleted successfully.');
    }
    public function show($id) {
        $subcategory = Subcategory::with('category', 'articles')->findOrFail($id);
        return view('dashboard.subcategories.show', compact('subcategory'));
    }
    
}
