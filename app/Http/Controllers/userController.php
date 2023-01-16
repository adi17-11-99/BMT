<?php

namespace App\Http\Controllers;

use App\Http\Requests\logInFormRequest;
use App\Http\Requests\userRegistrationFormRequest;
use App\Services\userServices;
use Illuminate\Http\Request;

class userController extends Controller{

    public static function userRegistration(userRegistrationFormRequest $request){
       $request->validated();
       userServices::userRegistration($request);
       return response()->success();
    }

    public static function logIn(logInFormRequest $request){
       $res = userServices::userLogIn($request);
       return response()->data($res);
    }
}
