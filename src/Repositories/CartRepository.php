<?php

namespace Mario1515\LaravelCart\Repositories;

use Illuminate\Support\Facades\Session;

use Mario1515\LaravelCart\Models\Cart;
use Mario1515\LaravelCart\Models\CartItem;

class CartRepository
{
    public function getOrCreateCart(): Cart
    {
        $sessionId = Session::getId();

        return Cart::query()
            ->select(['id', 'session_id', 'status', 'cart_personal_data_id'])
            ->firstOrCreate(['session_id' => $sessionId]);
    }

    public function addItem(int $cartId, array $data): CartItem
    {
        return CartItem::query()
            ->create([
                'cart_id'  => $cartId,
                'name'     => data_get($data, 'name'),
                'price'    => data_get($data, 'price', 0),
                'quantity' => data_get($data, 'quantity', 1),
                'currency' => data_get($data, 'currency'),
                'payload'  => data_get($data, 'payload', []),
            ]);
    }

    public function removeItem(int $itemId): void
    {
        CartItem::query()
            ->whereKey($itemId)
            ->limit(1)
            ->delete();
    }

    public function getCart(): ?Cart
    {
        $sessionId = Session::getId();

        return Cart::query()
            ->with('items')
            ->where('session_id', $sessionId)
            ->first();
    }
}
