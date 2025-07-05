<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'carts';
    protected $primaryKey = 'cartId';
    public $incrementing = true;
    protected $keyType = 'int';

    public function product()
    {
        return $this->belongsTo(Product::class, 'productId');
    }

    public function user() {
    return $this->belongsTo(User::class, 'userId');
}
}
