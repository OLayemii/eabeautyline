<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    //
    public function register(Request $request){
        $formdata = $request->formdata;
        if (!isset($formdata)){
            return response('Cant make a request', Response::HTTP_UNPROCESSABLE_ENTITY);             
        }

        $validator = Validator::make($formdata, [
            'firstname'  =>  'required',
            'lastname'   =>  'required',
            'email'      =>  'required|email|unique:users',
            'password'   =>  'required|min:8',
            'phoneno'    =>  'required'
        ]);

        if ($validator->fails()){
            return response($validator->getMessageBag()->jsonSerialize(), Response::HTTP_UNPROCESSABLE_ENTITY); 
        }

        $firstname = $formdata['firstname'];
        $lastname = $formdata['lastname'];
        $email = $formdata['email'];
        $password = $formdata['password'];
        $phoneno = $formdata['phoneno'];
        //When validation passes
        try{
            $user = new User();

            $user->firstname = $firstname;
            $user->lastname = $lastname;
            $user->email = $email;
            $user->password = Hash::make($password);
            $user->phoneno = $phoneno;

            $user->save();
            return response(json_encode(array(
                "success" => true
            )), Response::HTTP_OK);
        }catch(Exception $e){
            return response('Error creating user', Response::HTTP_UNPROCESSABLE_ENTITY); 
        }
    }
}
