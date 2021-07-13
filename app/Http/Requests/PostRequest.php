<?php

namespace App\Http\Requests;

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


            'title'         =>  'required'  ,
            'slug'          =>  'required'  ,
            'description'   =>  'required'  ,
            'meta_description'  =>  'required'  ,
            'meta_keywords' =>  'required'  ,
            'avatar'        =>  'required|file'  ,

        ];
    }



    public function messages()
    {
        return  [

            'title.required' =>  'عنوان اجباری است .  '    ,
            'slug.required'    =>  'نام مستعار اجباری است  .  '    ,
            'description.required' =>  'توضیحات اجباری است .   '    ,
            'meta_description.required' =>  'متا توضیحات اجباری هست .   '    ,
            'meta_keywords.required' =>  'متا تگ ها اجباری است .  '    ,
            'avatar.required'   =>  'عکس برای پست الزامی است . ',
            //'avatar.image'  =>  'حاجی عکس باید بزاری',
        ];
    }
}
