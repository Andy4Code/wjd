<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormValidatorRequest;

use Illuminate\Http\Request;

class FormController extends Controller
{


    public function store(FormValidatorRequest $request)  {

        if($request->validated()){
            echo "You data is validated successfully";
        }
        // $validated = $request->safe()->only(['name', 'email']);
        // $v = Validator::make($request->all(),[
        //     'text'=>'required|string|min:1|max:20',
        //     'email' => 'required|email',//regex:/^.+@.+$/i
        //     'phone' => 'required|numeric|min:1|max:15'
        // ]);
        // $request->validate([
            // 'text'=>'required|string|min:1|max:20',
            // 'email' => 'required|email',//regex:/^.+@.+$/i
            // 'phone' => 'required|numeric|min:1|max:15'
        // ]);
        // if($v->fails()){
        //     // return $v->errors()->toArray();
        //     // echo "fail";
        //     }

        // dd($v->validated());
    }
}
