<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'article';
    protected $primaryKey = 'articleID';

    protected $fillable = ['articleName', 'description', 'price', 'quantity', 'status', 'sizeID', 'colorID', 'subcategoryID', 'imageID'];

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class, 'subcategoryID');
    }

    public function size()
    {
        return $this->belongsTo(Size::class, 'sizeID');
    }

    public function color()
    {
        return $this->belongsTo(Color::class, 'colorID');
    }

    public function image()
    {
        return $this->hasOne(Image::class, 'imageID', 'imageID');
    }
    public function cart()
{
    return $this->belongsToMany(Cart::class, 'article_cart')
                ->withPivot('quantity');
}
}
