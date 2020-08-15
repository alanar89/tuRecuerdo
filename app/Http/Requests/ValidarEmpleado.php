<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidarEmpleado extends FormRequest
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
            'nombre'=>'required|min:2|alpha',
             'apellido'=>'required|min:2|alpha',
              'telefono'=>'required|min:9|numeric',
               'email'=>'required|email',
                   'password'=>'required|min:4',
             
        ];
    }
}
