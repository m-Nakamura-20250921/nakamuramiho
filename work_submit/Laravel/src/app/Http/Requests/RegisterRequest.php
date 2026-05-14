<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => ['required','min:2','max:30'],
            'name_kana'=>['required','regex:/^[ア-ン゛゜ァ-ォャ-ョー]+$/u','min:3','max:50'],
            'email' => ['required','email','unique:users','max:255'],
            'password' => ['required','regex:/^[a-zA-Z0-9]+$/','min:8','max:20'],
        ];
    }

    public function messages()
    {
        return [
            // 名前
            'name.required' => '名前を記入してください。',
            'name.min:2' => '2文字以上で記入してください',
            'name.max:30' => '30字以内で記入してください',

            // 名前（カナ）
            'name_kana.required.regex' => '全角カタカナで記入してください',
            'name_kana.min' => '3文字以上で記入してください',
            'name_kana.max' => '50字以内で記入してください',

            'email.*' => '新しいメールアドレスで記入してください。',
            'password.*' => 'パスワードが異なります。正しいパスワードを入力してください。'
        ];
    }
}
