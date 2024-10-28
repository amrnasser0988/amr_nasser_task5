<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        
        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json(['message' => 'Invalid login details'], 401);
        }

        
        $user = Auth::user();

        
        $token = $user->createToken('auth_token')->plainTextToken;

        
        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
        ]);
    }

    //  تسجيل الخروج
    public function logout(Request $request)
    {
        // حذف التوكنات الخاصة بالمستخدم
        $request->user()->tokens()->delete();

        //  نجاح العملية
        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }
}
