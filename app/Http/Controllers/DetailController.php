<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Detail;
use App\Models\Article;
use App\Models\Size;
use App\Models\Color;
use Validator;

class DetailController extends Controller
{
    public function index() {
        $details = Detail::with(['article', 'size', 'color'])->get();
        return view('details.index', compact('details'));
    }

    public function create() {
        $articles = Article::all();
        $sizes = Size::all();
        $colors = Color::all();
        return view('details.create', compact('articles', 'sizes', 'colors'));
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'price' => 'required|numeric',
            'quantity' => 'required|integer|min:1',
            'articleID' => 'required|exists:article,articleID',
            'sizeID' => 'required|exists:size,sizeID',
            'colorID' => 'required|exists:color,colorID',
            'status' => 'required'
        ]);

        Detail::create($validatedData);

        return redirect()->route('details.index')->with('success', 'Detail created successfully.');
    }

    public function show($id) {
        $detail = Detail::with(['article', 'size', 'color'])->findOrFail($id);
        return view('details.show', compact('detail'));
    }

    public function edit($id) {
        $detail = Detail::with(['article', 'size', 'color'])->findOrFail($id);
        $articles = Article::all();
        $sizes = Size::all();
        $colors = Color::all();
        return view('details.edit', compact('detail', 'articles', 'sizes', 'colors'));
    }

    public function update(Request $request, $id) {
        $validatedData = $request->validate([
            'price' => 'required|numeric',
            'quantity' => 'required|integer|min:1',
            'articleID' => 'required|exists:article,articleID',
            'sizeID' => 'required|exists:size,sizeID',
            'colorID' => 'required|exists:color,colorID',
            'status' => 'required'
        ]);

        $detail = Detail::findOrFail($id);
        $detail->update($validatedData);

        return redirect()->route('details.index')->with('success', 'Detail updated successfully.');
    }

    public function destroy($id) {
        $detail = Detail::findOrFail($id);
        $detail->delete();

        return redirect()->route('details.index')->with('success', 'Detail deleted successfully.');
    }
}