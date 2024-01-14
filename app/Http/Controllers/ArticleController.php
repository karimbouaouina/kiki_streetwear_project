<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Image;
use App\Models\Size;
use App\Models\Color;

use App\Models\Category;
use App\Models\Subcategory;
use Validator;

class ArticleController extends Controller
{
    public function index()
{
    $articles = Article::with('image')->get();
    return view('dashboard.articles.index', compact('articles'));
}
public function create() {
    $subcategories = Subcategory::all();
    $images = Image::all(); 
    $sizes = Size::all(); 
    $colors = Color::all();

    return view('articles.create', compact('subcategories', 'images', 'sizes', 'colors'));
}

    public function store(Request $request) {
        $validatedData = $request->validate([
            'articleName' => 'required|max:255',
            'description' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'status' => 'required',
            'sizeID' => 'required|exists:size,sizeID',
            'colorID' => 'required|exists:color,colorID',
            'subcategoryID' => 'required|exists:subcategory,subcategoryID',
            'imageID' => 'nullable|exists:image,imageID'
        ]);
    
        $article = new Article($validatedData);
        $article->save();
    
        return redirect('/dashboard/articles')->with('success', 'Article created successfully.');
    }


    public function show($articleID) {
        $article = Article::with(['subcategory', 'image'])->findOrFail($articleID);
        return view('articles.show', compact('article'));
    }
    

public function edit($id)
{
    $article = Article::findOrFail($id);
    $subcategories = Subcategory::all();
    $images = Image::all(); 
    $sizes = Size::all(); 
    $colors = Color::all();

    return view('articles.edit', compact('article', 'subcategories', 'images', 'sizes', 'colors'));
}


public function update(Request $request, $id) {
    $validatedData = $request->validate([
        'articleName' => 'required|max:255',
        'description' => 'required',
        'price' => 'required|numeric',
        'quantity' => 'required|integer',
        'status' => 'required',
        'sizeID' => 'required|exists:size,sizeID',
        'colorID' => 'required|exists:color,colorID',
        'subcategoryID' => 'required|exists:subcategory,subcategoryID',
        'imageID' => 'nullable|exists:image,imageID'
    ]);

    $article = Article::findOrFail($id);
    $article->update($validatedData);

    return redirect('/dashboard/articles')->with('success', 'Article updated successfully.');
}



public function destroy($id) {
    $article = Article::findOrFail($id); 
    $article->delete();

    return redirect('/dashboard/articles')->with('success', 'Article deleted successfully.');
}

}
