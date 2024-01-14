<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class UserCategoryController extends Controller
{
    public function index(){
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    public function show($categoryName){
        $category = Category::where('categoryName', $categoryName)->first();
    
        if (!$category) {
            abort(404);
        }
    
        $subcategories = Subcategory::where('categoryID', $category->categoryID)->get();
        
        return view('subcategories.index', compact('category','subcategories'));
    }
    
}
