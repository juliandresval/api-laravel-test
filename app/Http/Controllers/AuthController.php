<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function login(LoginRequest $request)
    {
        if (!Auth::attempt($request->validated())) {
            return response()->json([
                'message' => 'Invalid credentials'
            ], 401);
        }

        $user = User::where('username', $request->get('username'))->first();

        return response()->json([
            'message' => 'Authenticated successfuly',
            'access_token' => $user->createToken('Api_Token')->plainTextToken,
            'token_type' => 'Bearer',
        ], 200);
    }

    public function logout() {
        auth()->user()->tokens()->delete();
        return response()->json([
            'message' => 'logout'
        ]);

    }
}
