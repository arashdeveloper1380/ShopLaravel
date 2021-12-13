<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'category_fa'=>'required|max:100|string|unique:category',
            'category_en'=>'required|max:100|string|unique:category',
        ];
    }

    public function attributes()
    {
        return [
            'category_fa'=>'نام دسته',
            'category_en'=>'نام لاتین دسته',
        ];
    }
}
