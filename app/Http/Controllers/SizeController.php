<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Size;
use Validator;

class SizeController extends Controller
{
    public function index() {
        $sizes = Size::all();
        return view('sizes.index', compact('sizes'));
    }

    public function create() {
        return view('sizes.create');
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'size' => 'required|max:255|unique:size'
        ]);

        Size::create($validatedData);

        return redirect()->route('sizes.index')->with('success', 'Size created successfully.');
    }

    public function show($sizeID) {
        $size = Size::findOrFail($sizeID);
        return view('sizes.show', compact('size'));
    }

    public function edit($sizeID) {
        $size = Size::findOrFail($sizeID);
        return view('sizes.edit', compact('size'));
    }

    public function update(Request $request, $sizeID) {
        $validatedData = $request->validate([
            'size' => 'required|max:255|unique:size,size,' . $sizeID . ',sizeID'
        ]);
    
        $size = Size::findOrFail($sizeID);
        $size->size = $validatedData['size']; 
        $size->save();
    
        return redirect()->route('sizes.index')->with('success', 'Size updated successfully.');
    }
    

    public function destroy($sizeID) {
        $size = Size::findOrFail($sizeID);
        $size->delete();

        return redirect()->route('sizes.index')->with('success', 'Size deleted successfully.');
    }
}
