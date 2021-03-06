<?php

namespace App\Http\Requests\v1\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UserAPIUpdateFormRequest extends UserAPIStoreFormRequest
{
    //todo: implement role
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['nullable', 'string', 'max:255'],
            'email' => ['nullable', 'email', Rule::unique('users')->ignore($this->user)],
            'password' => ['nullable', 'string', 'max:255'],
            'photo'=>['nullable','string']
        ];
    }
}
