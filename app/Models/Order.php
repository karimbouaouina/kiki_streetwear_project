<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $primaryKey = 'orderID';
    protected $table = 'order';
    protected $fillable = ['userID', 'cartID'];

    public function user()
    {
        return $this->belongsTo(User::class, 'userID');
    }

    public function cart()
    {
        return $this->belongsTo(Cart::class, 'cartID');
    }



    public function bill()
    {
        return $this->hasOne(Bill::class, 'orderID');
    }
    





}