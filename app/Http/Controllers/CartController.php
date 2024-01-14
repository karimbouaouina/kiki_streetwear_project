<?php 
namespace App\Http\Controllers;

use App\Models\ArticleCart;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Article;
use App\Models\User;

class CartController extends Controller
{
    public function index()
    {
        $cartItems= [];

        $latestCart = Cart::where('userID', auth()->user()->userID)->latest()->first();

        $totalPrice = 0;
        if($latestCart) {
            $isCartAvailable = Order::where('cartID', $latestCart->cartID)->get();
            if($isCartAvailable->isEmpty()){
                $cartItems = ArticleCart::where('cartID', $latestCart->cartID)->get();

                foreach ($cartItems as $cartItem) {
                    $totalPrice += $cartItem->article->price * $cartItem->quantity;
                }
            }
        }
        return view('cart.index', compact('cartItems','totalPrice'));
    }

    public function create() {
        $users = User::all();
        $articles = Article::all();
        return view('cart.create', compact('users', 'articles'));
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'userID' => 'required|exists:user,userID', 
            'articles' => 'required|array',
            'articles.*.id' => 'required|exists:article,articleID',
            'articles.*.quantity' => 'required|integer|min:1',
            'articles.*.sellingPrice' => 'required|numeric|min:0', 
        ]);
        
        $cart = new Cart();
        $cart->userID = $validatedData['userID'];
        $cart->save();
        
        foreach ($validatedData['articles'] as $articleData) {
            $cart->articles()->attach($articleData['articleID'], [
                'quantity' => $articleData['quantity'],
                'sellingPrice' => $articleData['sellingPrice'], 
            ]);
        }
        
        return redirect()->route('cart.index')->with('success', 'Items added to cart successfully.');
    }
    

    public function show($id) {
        $cartItem = Cart::with(['user', 'articles'])->findOrFail($id);
        return view('cart.show', compact('cartItem'));
    }

    public function edit($id) {
        $cartItem = Cart::with('articles')->findOrFail($id);
        $articles = Article::all();
        return view('cart.edit', compact('cartItem', 'articles'));
    }

    public function update(Request $request, $id) {
        $validatedData = $request->validate([
            'articles' => 'required|array',
            'articles.*.id' => 'required|exists:articles,id',
            'articles.*.quantity' => 'required|integer|min:1',
        ]);

        $cartItem = Cart::findOrFail($id);

        $cartItem->articles()->detach();

        foreach ($validatedData['articles'] as $articleData) {
            $cartItem->articles()->attach($articleData['id'], ['quantity' => $articleData['quantity']]);
        }

        return redirect()->route('cart.index')->with('success', 'Cart updated successfully.');
    }

    public function destroy($id) {
        $cartItem = Cart::findOrFail($id);
        $cartItem->delete();
        return redirect()->route('cart.index')->with('success', 'Cart item removed successfully.');
    }
}
