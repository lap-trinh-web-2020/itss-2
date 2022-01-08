<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = "carts";
    public $timestamps = false;
    protected $connection = '';
    protected $fillable = [
        'user_id',
        'product_id',
        'quantily'
    ];

    public function products(){
        return $this->hasOne(Product::class, 'product_id', 'product_id');
    }
}
