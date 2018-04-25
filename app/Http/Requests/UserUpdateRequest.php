<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
            'id' => 'required|exists:users,id',
            'email' => 'required|email',
            'username' => 'required|min:4|max:32|unique:users,username,'.$this->get('id'),
            'name' => 'required|max:64',
            'last_name' => 'required|max:64',
            'password' => 'nullable|min:6|max:32|same:password_repeat|',
            'country' => 'required|size:2|exists:countries,alpha2',
        ];
    }
}
