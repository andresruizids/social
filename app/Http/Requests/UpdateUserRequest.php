<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
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
            'name'      => ['required', 'string', 'max:80'],
            'surname'   => ['required', 'string', 'max:80'],
            'nickname'  => ['required', 'min:5', 'max:80'],
            'nickname'  => Rule::unique('users')->ignore(Auth::user()->id),
            'email'     => ['required', 'email', 'max:120'],
            'email'     => Rule::unique('users')->ignore(Auth::user()->id),
        ];
    }
    public function messages()
    {
        return [
            // 'name.min'=>'Ingrese un nombre correcto',
        ];
    }
}
