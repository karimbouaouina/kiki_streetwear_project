<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleCart extends Model
{
    protected $table = 'article_cart';

    protected $fillable = ['cartID', 'quantity', 'articleID'];
    protected $primaryKey = 'articleID';
    public $timestamps = false;
    
    public function article()
    {
        return $this->belongsTo(Article::class, 'articleID', 'articleID');
    }
}
