<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleReq extends FormRequest
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

           return[

                'name'   => 'required' ,
                'family' =>'required' ,
                'email'  => 'required' ,
                'number' => 'required' ,
                'addres' => 'required' ,

        ] ;



    }
}