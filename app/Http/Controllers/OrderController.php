<?php

namespace App\Http\Controllers;

use App\Models\ArticleCart;
use App\Models\Bill;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;
use App\Models\Cart;
use Validator;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with(['user'])
                       ->get();
    
        foreach ($orders as $order) {
            $order->cartItems = ArticleCart::with(['article.size', 'article.color'])
                                           ->where('cartID', $order->cartID)
                                           ->get();
        }
    
        return view('orders.index', compact('orders'));
    }
    

    
    public function user_orders()
    {
        $userID = auth()->user()->userID;

        $orders = Order::whereHas('user', function ($query) use ($userID) {
                $query->where('userID', $userID);
            })
            ->with(['user'])
            ->get();

    
        foreach ($orders as $order) {
            $order->cartItems = ArticleCart::with(['article.size', 'article.color'])
                                           ->where('cartID', $order->cartID)
                                           ->get();
        }
    
        return view('orders.users', compact('orders'));
    }




    public function create()
    {   
        return view('orders.create');
    }


    public function store(Request $request)
{
    $latestCart = Cart::where('userID', auth()->user()->userID)->latest()->first();

    if($latestCart) {
        $order = Order::Create([
            'cartID' => $latestCart->cartID,
            'userID' => auth()->user()->userID
        ]);

        Bill::Create([
            'name' => $request->input('name'),
            'address' => $request->input('address'),
            'taxRegistrationNumber' => $request->input('taxRegistrationNumber'),
            'orderID' => $order->orderID
        ]);

    }
    return redirect('/userhome')->with('success', 'Article added successfully.');
}


    public function show($id)
    {
        $order = Order::with(['user', 'cart.details.article', 'cart.details.size', 'cart.details.color'])->findOrFail($id);
        return view('orders.show', compact('order'));
    }

    public function edit($id)
    {
        $order = Order::findOrFail($id);
        $users = User::all();
        return view('orders.edit', compact('order', 'users'));
    }

    public function update(Request $request, $id)
    {
        // Validate the request...
        $validatedData = $request->validate([
            'userID' => 'required|exists:user,userID',
        ]);

        $order = Order::findOrFail($id);
        $order->update($validatedData);

        return redirect()->route('orders.index')->with('success', 'Order updated successfully.');
    }

    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return redirect()->route('orders.index')->with('success', 'Order deleted successfully.');
    }
}
