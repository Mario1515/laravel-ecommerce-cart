<?php

namespace Mario1515\LaravelCart\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Cart extends Model
{
    protected $table = 'carts';

    protected $guarded = [];

    protected $casts = [
        'session_id' => 'string',
        'status'     => 'string',
    ];

    public function items(): HasMany
    {
        return $this->hasMany(CartItem::class);
    }

    public function personalData(): BelongsTo
    {
        return $this->belongsTo(CartPersonalData::class);
    }
}
