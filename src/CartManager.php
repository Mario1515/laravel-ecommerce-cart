<?php

namespace Mario1515\LaravelCart;

use Mario1515\LaravelCart\CartService;
use Mario1515\LaravelCart\Models\Cart;
use Mario1515\LaravelCart\Models\CartItem;
use Mario1515\LaravelCart\Models\CartPersonalData;

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

    public function removeItem(int $itemId): void
    {
        $this->service->removeItem($itemId);
    }

    public function getCart(): ?Cart
    {
        return $this->service->getCart();
    }

    public function addPersonalData(array $data): CartPersonalData
    {
        return $this->service->addPersonalData($data);
    }
}
