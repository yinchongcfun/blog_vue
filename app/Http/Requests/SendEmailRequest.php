<?php
/**
 * Created by PhpStorm.
 * User: cfun
 * Date: 2018/11/1
 * Time: 14:38
 */

namespace App\Http\Requests;


class SendEmailRequest extends RequestBase
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
     * @return array
     */
    public function rules()
    {
        $rules = [
            'email'    => 'required |email|unique:users,email',
        ];

        return $rules;
    }

    /**
     * @return array
     */
    public function messages()
    {
        $message = [
            'email.required'    => 'email必须填写',
            'email.email'       => 'email格式不正确',
            'email.unique'      => '该邮箱已经注册过了！',
        ];

        return $message;
    }

}