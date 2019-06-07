<?php

namespace app\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'content' => 'required',
            'image' => 'image|mimes:png,jpeg'
        ];
    }

    public function messages(){

        return [
            'content.required' => '投稿内容は必須項目です。',
            'image.image' => '画像ファイルを選択してください', 
        ];
    }
}
