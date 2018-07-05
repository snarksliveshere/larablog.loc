<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdatePost extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // по сути еще один middleware

        return true;
    }

    public function messages()
    {
        return [
            'image.max' => 'Это уж слишком большое изображение',
            'title.required' => 'Тут нужен заголовок',
            'title.max' => 'слишком длинный заголовок',
            'content.required' => 'Нужен контент',
            'image:image' => 'Загружаемый файл должен быть картинкой!'

        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|max:255',
            'content' => 'required',
            'image' => 'nullable|image|max:300000'
        ];
    }
}
