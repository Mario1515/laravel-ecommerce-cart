<?php

namespace Mario1515\LaravelCart\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class CartPersonalData extends Model
{
    protected $table = 'cart_personal_data';

    protected $guarded = [];

    protected $casts = [
        'payload' => 'array',
    ];

    public function cart(): HasOne
    {
        return $this->hasOne(Cart::class, 'cart_personal_data_id');
    }
}
