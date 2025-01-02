<?php

namespace App\Http\Requests\Admin\Post;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required | string',
            'content' => 'required | string',
            'preview_image' => 'required | file',
            'main_image' => 'required | file',
            'category_id' => 'required | integer |exists:categories,id',
            'tag_ids' => 'nullable | array',
            'tag_ids.*' => 'nullable | integer | exists:tags,id',


        ];

    }

    public function messages()
    {
        return [
            'title.required' => 'Це поле необхідне для заповнення',
            'title.string' => 'Данні повинні відповідати рядковому типу',
            'content.required' => 'Це поле необхідне для заповнення',
            'content.string' => 'Данні повинні відповідати рядковому типу',
            'preview_image.required' => 'Це поле необхідне для заповнення',
            'preview_image.file' => 'Потрібно вибрати файл',
            'main_image.required' => 'Це поле необхідне для заповнення',
            'main_image.file' => 'Потрібно вибрати файл',
            'category_id.required' => 'Це поле необхідне для заповнення',
            'category_id.integer' => 'Id категорії мають бути числом',
            'category_id.exists' => 'Id категорії мають бути в базі данних',
            'tag_ids.array' => 'Необхідно відправити масив данних',
        ];
    }
}
