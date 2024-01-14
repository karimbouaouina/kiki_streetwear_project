<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $primaryKey = 'billID';
    protected $table = 'bill';
    protected $fillable = ['name', 'address', 'billingDate', 'taxRegistrationNumber', 'orderID'];


    public function order()
    {
        return $this->belongsTo(Order::class, 'orderID');
    }
}