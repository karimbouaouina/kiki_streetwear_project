<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    protected $fillable = ['subcategoryName', 'categoryID','imageID'];

    protected $table = 'subcategory';

    protected $primaryKey = 'subcategoryID';

    public function category()
    {
        return $this->belongsTo(Category::class, 'categoryID');
    }

    public function articles()
    {
        return $this->hasMany(Article::class, 'subcategoryID');
    }
    public function image()
    {
        return $this->hasOne(Image::class, 'imageID', 'imageID');
    }
}