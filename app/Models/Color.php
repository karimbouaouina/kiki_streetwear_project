<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    protected $primaryKey = 'colorID';
    protected $table = 'color';
    protected $fillable = ['color'];



    public function articles()
    {
        return $this->hasMany(Article::class, 'colorID');
    }
}