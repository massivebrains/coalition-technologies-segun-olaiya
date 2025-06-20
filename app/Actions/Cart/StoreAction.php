<?php

namespace App\Actions\Cart;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class StoreAction
{
    public const CART_JSON_FILE_PATH = 'db/cart.json';

    /**
     * @throws \JsonException
     */
    public function handle(string $productName, int $quantity, float $price): array
    {
        $cartItem = [
            'id' => Str::uuid()->toString(),
            'product_name' => $productName,
            'quantity' => $quantity,
            'price' => $price,
            'created_at' => now(),
        ];

        $existingCart = [];

        if (Storage::exists(self::CART_JSON_FILE_PATH)) {
            $json = Storage::get(self::CART_JSON_FILE_PATH);
            $existingCart = json_decode($json, true, 512, JSON_THROW_ON_ERROR) ?? [];
        }

        $existingCart[] = $cartItem;

        Storage::put(self::CART_JSON_FILE_PATH, json_encode($existingCart, JSON_THROW_ON_ERROR | JSON_PRETTY_PRINT));

        return $existingCart;
    }
}
