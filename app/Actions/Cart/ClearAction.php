<?php

namespace App\Actions\Cart;

use Illuminate\Support\Facades\Storage;

class ClearAction
{
    /**
     * @throws \JsonException
     */
    public function handle(): void
    {
        Storage::put(StoreAction::CART_JSON_FILE_PATH, json_encode([], JSON_THROW_ON_ERROR | JSON_PRETTY_PRINT));
    }
}
