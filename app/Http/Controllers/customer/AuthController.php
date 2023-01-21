<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerloginRequest;
use App\Http\Requests\CustomerRequest;
use App\Models\User;
use App\Trait;
use Illuminate\Support\Facades\Auth;
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

    public function login(CustomerLoginRequest $request)
    {
        $request->validated($request->all());
        if (!Auth::attempt($request->only(['email','password']))){
            return $this->error('','Credential is not valid',401);
        }
        else {
            $user = User::where('email',$request->email)->first();
            return $this->success(['user'=>$user,
                'token'=>$user->createToken('Api token of '.$user->name)->plainTextToken],
            'You are logged in');
        }

    }


}
//sudo /opt/lampp/lampp start
