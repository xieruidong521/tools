<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GoogleAuthenticatorBindRequest extends FormRequest
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
        return [
            'source_code'=>'required',
            'user_code'  =>'required|digits_between:6,6',
        ];
    }
    public function messages()
    {
        return [
            'source_code.required'=>'谷歌code不能为空',
            'user_code.required'  =>'验证码不能为空',
            'user_code.digits_between'=>'验证码输入有误',
        ];
    }
}
