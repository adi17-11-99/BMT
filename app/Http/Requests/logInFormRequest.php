<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;

class logInFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
            $signInVia = Request::get('signInVia');
            if($signInVia == 'email'){
                return[
                'signInVia'=> 'required|in:number,email',
                'email'    => 'required|email',
                'password' => 'required'
                ];
        }
            else{
                return[
                    'signInVia'   => 'required|in:number,email',
                    'phoneNumber' => 'required',
                    'password'    => 'required'
                ];
            }
            
    }
}
