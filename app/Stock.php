<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    //
    public $incrementing = false;
    protected $table = 'stock';
	protected $fillable = [
        'id',
        'stock_name',
        'stock_qty',
        'stock_unit',
        'stock_price_per_kg',
        'stock_weight_per_qty'       
    ];
}
