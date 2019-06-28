<?php
/**
 * Created by PhpStorm.
 * User: cfun
 * Date: 2018/11/1
 * Time: 14:38
 */

namespace App\Http\Requests;


class ArticleIdRequest extends RequestBase
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
            'id'    => 'required |exists:article,id',
            'password' => 'required',
        ];

        return $rules;
    }

    /**
     * @return array
     */
    public function messages()
    {
        $message = [
            'id.required'    => '文章id必须填写',
            'id.exists'       => '文章id不存在',
        ];

        return $message;
    }

}