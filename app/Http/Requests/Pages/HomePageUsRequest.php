<?php

namespace App\Http\Requests\Pages;

use Illuminate\Foundation\Http\FormRequest;

class HomePageUsRequest extends FormRequest
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
            'default_country' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'call_us' => 'required|string|max:20',
            'description' => 'required|string',
            'seo_keyword'  => 'required',
            'seo_description' => 'required',
            'seo_title'  => 'required',
            'facebook_link' => 'nullable|url',
            'instagram_link' => 'nullable|url',
            'twitter_link' => 'nullable|url',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'background' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'default_seo_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'ads_sidebar' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ];
    }
    public function messages()
{
    return [
        'required' => 'هذا الحقل مطلوب',
        'image' => 'يجب ان يكون الملف صورة',
        'mimes' => 'يجب ان تكون الصورة بصيغة: jpeg, png, jpg, gif, webp',
        'max' => 'يجب ألا يتجاوز حجم الصورة 2 ميجابايت',

        // رسائل مخصصة لكل صورة
        'logo.required' => 'يجب اضافة شعار الموقع',
        'background.required' => 'يجب اضافة خلفية الموقع',
        'default_seo_image.required' => 'يجب اضافة صورة SEO الافتراضية',
        'ads_sidebar.required' => 'يجب اضافة صورة الاعلانات الجانبية',
    ];
}

}