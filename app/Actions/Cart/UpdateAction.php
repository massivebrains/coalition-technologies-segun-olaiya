<?php

namespace App\Actions\Cart;

use Illuminate\Support\Facades\Storage;

class UpdateAction
{
    /**
     * @throws \JsonException
     */
    public function handle(string $id, string $productName, int $quantity, float $price): void
    {
        $cart = app(GetAction::class)->handle()['cart'];
        $item = collect($cart)->firstWhere('id', $id);
        if (! $item) {
            return;
        }

        $item['product_name'] = $productName;
        $item['quantity'] = $quantity;
        $item['price'] = $price;

        $updatedCart = collect($cart)->reject(fn ($item) => $item['id'] === $id)->add($item)->values()->all();
        Storage::put(StoreAction::CART_JSON_FILE_PATH, json_encode($updatedCart, JSON_THROW_ON_ERROR | JSON_PRETTY_PRINT));
    }
}
