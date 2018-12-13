<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class LoginController extends Controller
{
    //
    public function login(Request $request){
        $formdata = $request->formdata;
        if(Auth::attempt(['email' => $formdata['email'], 'password' => $formdata['password']])){
            $user = Auth::user();
            $success['token'] =  $user->createToken('MyApp')->accessToken;
            return response()->json(['success' => $success], Response::HTTP_OK);
        }
        else{
            return response()->json(['error'=>'Unauthorised'], 401);
        }
    }
}
