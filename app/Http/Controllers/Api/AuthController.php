<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function login(Request $request)
    {

        try {
            if (Auth::attempt(['email' =>$request->get('email'), 'password' => $request->get('password')])) {
                $token = Auth::user()->createToken('MyApp')->accessToken;
                return response()->json(['token' => $token], 200);
            }
            return response()->json(['message' => 'Unauthorized'], 401);
        }catch (\Exception $e){
            return response()->json(['message' => $e->getMessage()], 401);
        }

    }

}
