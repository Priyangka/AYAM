<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cost extends Model
{
    //
    public $incrementing = false;
    protected $table = 'cost';
	protected $fillable = [
        'id',
        'cost_name',
        'cost',
        'stock_id'       
    ];
}
