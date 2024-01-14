<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';

    protected $primaryKey = 'categoryID';
    protected $fillable = ['categoryName','imageID'];

    public function subcategories()
    {
        return $this->hasMany(Subcategory::class, 'categoryID');
    }
    public function image()
{
    return $this->hasOne(Image::class, 'imageID', 'imageID');
}
}