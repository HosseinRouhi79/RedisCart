<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerRequest;
use App\Models\User;
use App\Trait;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    use Trait\HttpRequest;

    public function register(CustomerRequest $request)
    {
        $request->validated($request->all());
        $user = User::create([
           'name'=>$request->name,
           'email'=>$request->email,
           'password'=>Hash::make($request->password),
        ]);
        return $this->success([
            'user'=>$user,
            'token'=>$user->createToken('Api token for '.$user->name)->plainTextToken
        ],'Registeration is successfull');

    }

}
//sudo /opt/lampp/lampp start
