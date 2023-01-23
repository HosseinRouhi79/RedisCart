<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use App\Models\Phones;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $phones = Phones::all();
        return response()->json([
           'phones'=>$phones
        ]);
    }
}
