<?php
namespace App\Services;

use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Hash;

class userServices{

    public static function userRegistration($request){
       if(isset($request->firstName))
       $dataArray = array();
       $dataArray['first_name'] = $request->firstName;
       $dataArray['last_name'] = $request->lastName;
       $dataArray['email'] = $request->email;
       $dataArray['phone_number'] = $request->phoneNumber;
       $dataArray['password'] = Hash::make($request->password);
       $bytes = random_bytes(10);
       $str='?phoneNo='.$dataArray['phone_number'].'?uniquecode='.bin2hex($bytes);
       $token = (base64_encode($str));
       $dataArray['id_token'] = $token;
       $insertDataToUsers = User::insertData($dataArray);
    }

    public static function userLogIn($request){ 
        if($request->signInVia == 'email'){
            $user = user::getUser($request->email);
        }
        elseif($request->signInVia == 'number'){
            $user = user::getUserByNumber($request->phoneNumber);
        }
        if($user){
            if(Hash::check($request->password,$user->password)){
            $bytes = random_bytes(10);
            $str='?email='.$user->email.'?uniquecode='.bin2hex($bytes);
            $token = (base64_encode($str));
            $data['token'] = $token;
            $data['email'] = $user->email;
            $data['success'] = 'Logged in succesfully';
            return $data;
            }
            else{
            echo('Password is incorrect');
            }
        }
        else{
            echo('user does not exist');
        }

    }
}
