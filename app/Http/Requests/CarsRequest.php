<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarsRequest extends FormRequest
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
            //photo => required => altijd verplicht
            //photo => required_without:id => altijd verplicht behalf als de form bevat id  <input name="id" value="{{$mainCategory -> id}}" type="hidden"> bij update

            'photo' => 'required_without:id|mimes:jpg,jpeg,png,webp',
            'id'=>'required|exists:cars,id',
            'name' => 'required|unique:cars,name,' . $this->id,
            'slug' => 'required|unique:cars,slug,' . $this->id,
//            'active' => 'required',
        ];

    }
    public function messages()
    {
        return [
            'required' => 'هذا الحقل مطلوب',
            'photo.required' => 'يجب اضافة صورة',
            'photo.mimes' => 'صيغة الصورة التي تم تحميلها غير صحيحة',
            'unique'=>'تم ادخال هذه العيارة مسبقا',
            'exists'=>'رقم السيارة غير موجود في قاعدة البيانات'

        ];
    }
}
