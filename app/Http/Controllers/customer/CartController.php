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
           'phones'=>$phones
        ]);
    }

    public function addToCart(Phones $phone)
    {
        Redis::lpush('cart',$phone->name);

        $values = Redis::lrange('cart',0,-1);
        return $values;
    }
}
