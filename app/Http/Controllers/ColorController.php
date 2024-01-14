<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Color;
use Validator;

class ColorController extends Controller
{
    public function index() {
        $colors = Color::all();
        return view('colors.index', compact('colors'));
    }

    public function create() {
        return view('colors.create');
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'color' => 'required|max:255|unique:color'
        ]);

        Color::create($validatedData);

        return redirect()->route('colors.index')->with('success', 'Color created successfully.');
    }

    public function show($colorID) {
        $color = Color::findOrFail($colorID);
        return view('colors.show', compact('color'));
    }

    public function edit($colorID) {
        $color = Color::findOrFail($colorID);
        return view('colors.edit', compact('color'));
    }

    public function update(Request $request, $colorID) {
        $validatedData = $request->validate([
            'color' => 'required|max:255|unique:color,color,' . $colorID . ',colorID'
        ]);
    
        $color = Color::findOrFail($colorID);
        $color->color = $validatedData['color']; 
        $color->save(); 
    
        return redirect()->route('colors.index')->with('success', 'Color updated successfully.');
    }
    

    public function destroy($colorID) {
        $color = Color::findOrFail($colorID);
        $color->delete();

        return redirect()->route('colors.index')->with('success', 'Color deleted successfully.');
    }
}
