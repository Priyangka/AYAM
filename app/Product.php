<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    public $incrementing = false;
    protected $table = 'product';
	protected $fillable = [
        'id',
        'pro_name',
        'pro_demand',
        'dem_unit',
        'price_per_kg',
        'weight_per_qty',
        'stock_id'      
    ];
}
