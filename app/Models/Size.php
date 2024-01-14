<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    protected $primaryKey = 'sizeID';
    protected $table = 'size';
    protected $fillable = ['size'];



    public function articles()
    {
        return $this->hasMany(Article::class, 'sizeID');
    }
}