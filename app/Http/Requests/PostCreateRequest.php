<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostCreateRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title'=>'required|min:10',
            'slug' =>'unique:posts',
            'description'=>'required',
            'first_photo'=>'required',
            'category'=>'required',
            'status'=>'required',
        ];
    }

    public function messages()
    {
        return[
            'title.required'=>'لطفا عنوان مطلب را وارد کنید',
            'title.min'=>'عنوان باید حداقل 10 کاراکتر داشته باشد.',
            'slug.unique' =>'این نام مستعار قبلا ثبت شده است.',
            'first_photo.required' =>'لطفا تصویر اصلی مطلب را وارد کنید.',
            'description.required' =>'لطفا توضیحات را وارد کنید.',
            'category.required' =>'لطفا دسته بندی را انتخاب کنید.',
            'status.required' =>'لطفا وضعیت را انتخاب کنید.',
        ];
    }
}
