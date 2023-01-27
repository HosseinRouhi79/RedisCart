<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use App\Models\Phones;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class CartController extends Controller
{
    public function index()
    {
        $phones = Phones::all();
        return response()->json([
            'phones' => $phones
        ]);
    }

    public function addToCart(Phones $phone)
    {
        Redis::lpush('cart', $phone->name);
    }

    public function removeFromCart(Phones $phone)
    {
        Redis::lrem('cart',1,$phone->name);
    }

    public function result()
    {
        return Redis::lrange('cart', 0, -1);
    }
}
