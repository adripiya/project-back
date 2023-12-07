<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{

    public function register(Request $request){
        $validator = Validator::make($request->all(),[
            'email' =>'required|string|max:255',
            'password'=>'required|string|min:8'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $user = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'regularuser',
        ]);


        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'user' => $user,
            'token' => $token,
        ]);
    }
    public function login(Request $request)
    {

        if(!Auth::attempt($request->only('email','password'))){
            return response()->json(['message' => 'Unathorized'], 401);
        }

        $user = User::where('email',$request['email'])->firstOrFail();
        $token = $user->createToken('auth_token')->plainTextToken;
        return response()->json([
            'user' => $user,
            'token' => $token,
        ]);
    }


    public function logout()
    {
        auth()->user()->tokens()->delete();
        return ['message'=> 'You have succesfully logged out and the token was succesfully deleted'];
    }
}
