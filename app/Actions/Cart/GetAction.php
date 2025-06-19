<?php

namespace App\Actions\Cart;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Number;

class GetAction
{
    public function handle(): array
    {
        if (!Storage::exists(StoreAction::CART_JSON_FILE_PATH)) {
            return [];
        }

        $json = Storage::get(StoreAction::CART_JSON_FILE_PATH);
        $cartItems = json_decode($json, true, 512, JSON_THROW_ON_ERROR);

        $cart = collect(is_array($cartItems) ? $cartItems : [])->sortBy('created_at');

        $total = $cart->reduce(function ($carry, $item) {
            return $carry + ($item['quantity'] * $item['price']);
        }, 0);

        return [
            'cart' => $cart,
            'total' => Number::currency($total),
        ];
    }
}
