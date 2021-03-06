<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
        // \Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:3|max:50',
            'surname' => 'required|min:3|max:50',
            'age' => 'required|integer',
            'city_id' => 'required|integer|exists:cities,id',
            'about' => 'string|min:3|max:500',
            'email' => 'required|email|max:50|unique:users',
            'password' => 'required|min:5',
        ];
    }
}
