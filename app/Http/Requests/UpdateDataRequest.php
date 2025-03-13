<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDataRequest extends FormRequest
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
            'title' => 'required|string|max:20',
            'category' => 'required|in:カテゴリ１,カテゴリ２,カテゴリ３',
            'content' => 'required|string|max:200',
        ];
    }

    /**
     * Get the custom validation messages.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'title.required' => 'タイトルを入力してください',
            'title.max' => 'タイトルは20文字以内で入力してください。',
            'category.required' => 'カテゴリは不明な値です',
            'content.required' => '本文を入力してください',
            'content.max' => '本文は200文字以内で入力してください。',
        ];
    }
}
