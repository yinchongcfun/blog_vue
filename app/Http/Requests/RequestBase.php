<?php
/**
 * Created by PhpStorm.
 * User: cfun
 * Date: 2018/11/20
 * Time: 18:07
 */

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class RequestBase extends FormRequest
{
    protected function failedValidation(Validator $validator) {
        $error= $validator->errors()->all();
        throw new HttpResponseException(response()->json(['msg'=>$error[0],'code'=>500,'date'=>$validator->errors()], 200));

    }
}