<?php

namespace Mario1515\LaravelCart;

use Mario1515\LaravelCart\CartService;
use Mario1515\LaravelCart\Models\Cart;
use Mario1515\LaravelCart\Models\CartItem;

class CartManager
{
    public function __construct(protected CartService $service) {}

    public function addItem(string $name, float $price, int $qty = 1, string $currency, array $payload = []): CartItem
    {
        return $this->service->addItem([
            'name'     => $name,
            'price'    => $price,
            'quantity' => $qty,
            'payload'  => $payload,
            'currency' => $currency,
        ]);
    }

    public function removeItem(int $itemId): Cart
    {
        return $this->service->removeItem($itemId);
    }
}
