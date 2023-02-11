<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use App\Models\Phones;
use App\Models\Record;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        Redis::lpush(Auth::user(), $phone->id);
    }

    public function removeFromCart(Phones $phone)
    {
        Redis::lrem(Auth::user(),1,$phone->id);
    }

    public function result()
    {
        return Redis::lrange(Auth::user(), 0, -1);
    }

    public function pay()
    {
        $record = Record::create([
           'user'=> Auth::user()->name,
           'email'=> Auth::user()->email
        ]);
        $phoneId = Redis::lrange(Auth::user(),0,-1);
        $record->phones()->attach($phoneId);
        Redis::del(Auth::user());

    }
}
