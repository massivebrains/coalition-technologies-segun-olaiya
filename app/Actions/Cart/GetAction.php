<?php

namespace App\Actions\Cart;

use Illuminate\Support\Facades\Storage;

class GetAction
{
    public function handle(): array
    {
        if (!Storage::exists(StoreAction::CART_JSON_FILE_PATH)) {
            return [];
        }

        $json = Storage::get(StoreAction::CART_JSON_FILE_PATH);
        $cartItems = json_decode($json, true, 512, JSON_THROW_ON_ERROR);

        return is_array($cartItems) ? $cartItems : [];
    }
}
