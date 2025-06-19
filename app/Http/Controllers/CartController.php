<?php

namespace App\Http\Controllers;

use App\Actions\Cart\ClearAction;
use App\Actions\Cart\GetAction;
use App\Actions\Cart\StoreAction;
use App\Actions\Cart\UpdateAction;
use App\Http\Requests\StoreCartRequest;
use App\Http\Requests\UpdateCartRequest;

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
        return response()->json(app(GetAction::class)->handle());
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

    public function update(UpdateCartRequest $request)
    {
        app(UpdateAction::class)->handle(
            request('id'),
            request('product_name'),
            request('quantity'),
            request('price'),
        );

        return response()->json([
            'cart' => app(GetAction::class)->handle()
        ]);
    }

    public function clear()
    {
        app(ClearAction::class)->handle();

        return response()->json([
            'cart' => app(GetAction::class)->handle()
        ]);
    }
}
