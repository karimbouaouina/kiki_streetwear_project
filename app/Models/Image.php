<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    protected $table = 'image';

    protected $primaryKey = 'imageID';
    protected $fillable = ['imageURL, imageALT'];
    public function category()
{
    return $this->belongsTo(Category::class, 'imageID', 'imageID');
}

public function subcategory()
{
    return $this->belongsTo(Subcategory::class, 'imageID', 'subcategory_id');
}

public function article()
{
    return $this->belongsTo(Article::class, 'imageID', 'imageID');
}
}
