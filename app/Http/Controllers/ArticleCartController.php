<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\ArticleCart;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Order;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Auth;

class ArticleCartController extends Controller
{
    public function index()
    {
        $articles = Article::with('image')->get();
        return view('articles.index', compact('articles'));
    }

    public function create(Request $request, $articleID) {
        $latestCart = Cart::where('userID', auth()->user()->userID)->latest()->first();
    
        if($latestCart && Order::where('cartID', $latestCart->cartID)->doesntExist()) {
            $cart = $latestCart;
        } else {
            $cart = Cart::Create([
                'userID' => auth()->user()->userID,
                'quantity' => 1,
                'sellingPrice' => 0
            ]);
        }
    
        $existingArticleCart = ArticleCart::where('articleID', $articleID)
                                           ->where('cartID', $cart->cartID)
                                           ->first();
        
        if($existingArticleCart) {
            $existingArticleCart->quantity += $request->input('quantity');
            $existingArticleCart->save();
        } else {
            ArticleCart::Create([
                'articleID' => $articleID,
                'cartID' => $cart->cartID,
                'quantity' => $request->input('quantity')
            ]);
        }
        
        return redirect('/cart')->with('success', 'Article added successfully.');
    }
      

    public function show($categoryName,$subcategoryName) {

        $subcategory = Subcategory::where('subcategoryName', $subcategoryName)->first();
    
        $articles = Article::where('subcategoryID', $subcategory->subcategoryID)->get();
        
        return view('articles.index', compact('articles'));
    }

    public function remove($cartid, $articleid) {
        ArticleCart::where('cartID', $cartid)
            ->where('articleID', $articleid)
            ->delete();
    
        $remainingArticles = ArticleCart::where('cartID', $cartid)->count();
        if ($remainingArticles == 0) {
            Cart::where('cartID', $cartid)->delete();
        }
    
        return redirect('/cart')->with('success', 'Article removed successfully.');
    }
}
