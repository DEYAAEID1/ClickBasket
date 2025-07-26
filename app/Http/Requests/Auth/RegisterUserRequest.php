<?php

namespace App\Http\Requests;

use App\Models\User as ModelsUser;
use App\Models\User\User;
use Illuminate\Foundation\Http\FormRequest;
use \Illuminate\Validation\Rules\Password;
class RegisterUserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.ModelsUser::class],
            'password' => ['required', 'confirmed',Password::defaults()],
            'phone' => ['nullable', 'string', 'max:20'],
            'address' => ['nullable', 'string'],
            'city' => ['nullable', 'string', 'max:100'],
            'postal_code' => ['nullable', 'string', 'max:20'],
        ];
    }
    
}
