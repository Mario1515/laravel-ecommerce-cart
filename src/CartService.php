<?php

namespace Mario1515\LaravelCart;

use Mario1515\LaravelCart\Models\Cart;
use Mario1515\LaravelCart\Models\CartItem;
use Mario1515\LaravelCart\Models\CartPersonalData;
use Mario1515\LaravelCart\Repositories\CartRepository;

class CartService
{
    public function __construct(protected CartRepository $cartRepo) {}

    public function addItem(array $data): CartItem
    {
        $cart = $this->cartRepo->getOrCreateCart(); 

        return $this->cartRepo->addItem($cart->id, $data);
    }

    public function removeItem(int $itemId): void
    {
        $this->cartRepo->removeItem($itemId);
    }

    public function getCart(): ?Cart
    {
        return $this->cartRepo->getCart();
    }

    public function addPersonalData(array $data): CartPersonalData
    {
        $cart = $this->cartRepo->getOrCreateCart();

        return $this->cartRepo->addPersonalData($cart, $data);
    }
}
