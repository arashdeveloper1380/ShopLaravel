<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SocialRequest extends FormRequest
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
            'social_fa'=>'required|max:60|unique:socials',
            'social_en'=>'required|max:60|unique:socials',
            'link'=>'required|max:255|unique:socials'
        ];
    }
    public function attributes()
    {
        return [
            'social_fa'=>'نام شبکه اجتماعی',
            'social_en'=>'نام لاتین شبکه اجتماعی',
            'link'=>'لینک شبکه اجتماعی'
        ];
    }
}
