<?php
/**
 * Created by PhpStorm.
 * User: cfun
 * Date: 2018/11/1
 * Time: 14:38
 */

namespace App\Http\Requests;


class CommentRequest extends RequestBase
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
            'id'    => 'required |exists:comments,id',
        ];

        return $rules;
    }

    /**
     * @return array
     */
    public function messages()
    {
        $message = [
            'id.required'    => '评论ID必须填写',
            'id.exists'       => '评论id不存在',
        ];

        return $message;
    }

}