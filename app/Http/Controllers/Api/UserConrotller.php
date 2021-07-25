<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserConrotller extends Controller
{


    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'phone_no' => 'required',
            'password' => 'required|confirmed'
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone_no = $request->phone_no;
        $user->password = bcrypt($request->password);

        $user->save();
        return response()->json(
            ['status' => 1,
                'massage' => 'Success register']
            , 201);

    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);


        if (!$token = auth()->attempt(["email" => $request->email, "password" => $request->password])) {
            return response()->json([
                'status' => 0,
                'message' => 'Invalid Credentials'
            ], 400);

        }

        return response()->json(
            ['status' => 1,
                'massage' => 'Success Login',
                'access_token' => $token
            ]
            , 200);


    }

    //-GET

    public function profile()
    {
        $user_data = auth()->user();

        return response()->json([
            'status' => 1,
            'massage' => 'user profile data',
            'data' => $user_data

        ]);


    }

    //-GET
    public function logout()
    {
        auth()->logout();
        return response()->json([
            'status' => 1,
            'massage' => 'User logged out'


        ]);

    }
}
