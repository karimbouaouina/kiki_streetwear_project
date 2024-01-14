<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $primaryKey = 'cartID';
    protected $table = 'cart';
    protected $fillable = ['userID', 'quantity', 'articleID', 'sellingPrice'];

    public function articles()
{
    return $this->hasMany(Article::class, 'article_cart')
                ->withPivot('quantity');
}

    public function user()
    {
        return $this->belongsTo(User::class, 'userID');
    }

    public function order()
    {
        return $this->belongsTo(Order::class, 'orderID');
    }
}
