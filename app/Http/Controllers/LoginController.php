<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class LoginController extends Controller
{
    //
    public function login(Request $request){
        // $formdata = $request->all();;
        // var_dump($request->all());

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            $user = Auth::user();
            $tokenResult = $user->createToken('EABeautyLine');
            $success['token'] = $tokenResult->accessToken;
            $success['token_type'] =  'Bearer';
            $success['expires_at'] = Carbon::parse(
                $tokenResult->token->expires_at
            )->toDateTimeString();
            return response()->json(['success' => $success], Response::HTTP_OK);
        }
        else{
            // var_dump($request->all());
            echo "Not logged in";
            // return response()->json(['error'=>'Unauthorised'], 401);
        }
    }
}
