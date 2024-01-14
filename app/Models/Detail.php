<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    protected $primaryKey = 'detailID';
    protected $table = 'detail';
    protected $fillable = ['price', 'quantity', 'articleID', 'sizeID', 'colorID', 'status'];

    public function article()
    {
        return $this->hasOne(Article::class, 'detailID', 'detailID');
    }

    public function size()
    {
        return $this->belongsTo(Size::class, 'sizeID');
    }

    public function color()
    {
        return $this->belongsTo(Color::class, 'colorID');
    }

    

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'detail_article_order', 'detailID', 'orderID');
    }
    public function cart()
    {
        return $this->belongsTo(Cart::class, 'cartID');
    }

}