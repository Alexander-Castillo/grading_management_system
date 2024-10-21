<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class loginController extends Controller
{
    Public function login(Request $request){
        $email = $request->input('email');
        $password = $request->input('password');
        //Validate email and password
        $user = User::where('email', $email)->where('password','=', $password)->first();
        if($user){
            $token = $user->createToken('uni-token')->plainTextToken;
            return response()->json([
                "user"=>$email, 
                "token"=>$token
            ], 200);
        }
        return response()->json(["message"=>"Yo are not Autorized"], 401);
    }
}
