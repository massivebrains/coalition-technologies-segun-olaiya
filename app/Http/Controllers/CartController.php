<?php

namespace App\Http\Controllers;

use App\Actions\Cart\GetAction;
use App\Actions\Cart\StoreAction;
use App\Http\Requests\StoreCartRequest;

class CartController extends Controller
{
    public function index()
    {
        return view('cart.index');
    }

    /**
     * @throws \JsonException
     */
    public function cart()
    {
        return response()->json([
            'cart' => app(GetAction::class)->handle()
        ]);
    }

    public function store(StoreCartRequest $request)
    {
        $cart = app(StoreAction::class)->handle(
            request('product_name'),
            request('quantity'),
            request('price'),
        );

        return response()->json([
            'cart' => $cart
        ]);
    }
}
