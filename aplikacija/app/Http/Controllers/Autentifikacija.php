<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class Autentifikacija extends Controller
{
    public function register(Request $request)   //POST
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['Greska', $validator->errors()]);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $token = $user->createToken('tokenReg')->plainTextToken;

        $response = [
            'User info: ' => $user,
            'Token: ' => $token,
        ];

        return response()->json($response);
    }




    public function login(Request $request) //POST
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['Greska', $validator->errors()]);
        }

        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json('Pogrešan email ili password!');
        }

        $user = User::where('email', $request['email'])->firstOrFail();

        $token = $user->createToken('tokenLogin')->plainTextToken;

        $response = [
            'User info: ' => $user,
            'Token: ' => $token,
        ];

        return response()->json($response);
    }



    public function logout() //POST
    {
        auth()->user()->tokens()->delete();
        return response()->json('Uspesno!');
    }
}
