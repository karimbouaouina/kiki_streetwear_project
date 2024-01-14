<?php

// app/Http/Controllers/CategoryController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Image;


class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::all();
        return view('dashboard.categories.index', compact('categories'));
    }

    public function create()
{
    $images = Image::all(); // Fetch all images
    return view('dashboard.categories.create', compact('images'));
}

    public function store(Request $request)
    {
        $request->validate([
            'categoryName' => 'required|max:255',
        ]);
        
        $category = new Category();
        $category->categoryName = $request->categoryName;
        $category->save();

        return redirect('/dashboard/categories')->with('success', 'Category created successfully.');
    }

    public function edit($id)
{
    $category = Category::findOrFail($id);
    $images = Image::all();
    return view('dashboard.categories.edit', compact('category', 'images'));
}

    public function update(Request $request, $id)
{
    $validatedData = $request->validate([
        'categoryName' => 'required|max:255',
        'imageID' => 'nullable|exists:image,imageID',
    ]);
    
    $category = Category::findOrFail($id);
    $category->categoryName = $validatedData['categoryName'];

    if (isset($validatedData['imageID'])) {
        $category->imageID = $validatedData['imageID'];
    }

    $category->save();

    return redirect('/dashboard/categories')->with('success', 'Category updated successfully.');
}

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect('/dashboard/categories')->with('success', 'Category deleted successfully.');
    }
    public function show($categoryID) {
        $category = Category::with('subcategories')->findOrFail($categoryID);
        return view('dashboard.categories.show', compact('category'));
    }
    

}
