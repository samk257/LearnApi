<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $fields = $request->validate([
            'name'  => 'required|string',
            'email' =>'required|unique:users,email',
            'password'=> 'required|confirmed'
        ]);

        $user = User::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'password'  => bcrypt($fields['password'])
        ]);

        $token = $user->createToken('myapptoken')->plainTextToken;

        $response=[
            'user'=>$user,
            'token'=>$token
        ];
        return response($response,201);
    }
    public function login(Request $request)
    {
        $fields = $request->validate([
            'email' =>'required',
            'password'=> 'required'
        ]);
        // check email if exist in database
        $user = User::where('email',$fields['email'])->first();

        // check password
        if(!$user || !Hash::check($fields['password'],$user->password)){
            return response([
                'message'=>'Wrong password'
            ],401);
        }

        $token = $user->createToken('myapptoken')->plainTextToken;

        $response=[
            'user'=>$user,
            'token'=>$token
        ];
        return response($response,201);
    }
    public function logout(User $user){
        $user->tokens()->delete();

        return [
            'message'=>'Logged Out'
        ];
    }
}
