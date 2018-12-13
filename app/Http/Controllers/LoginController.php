<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class LoginController extends Controller
{
    //
    public function login(Request $request){
        return response($request->all(), Response::HTTP_OK);
    }
}
