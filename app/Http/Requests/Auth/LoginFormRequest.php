<?php

namespace App\Http\Requests\Auth;

use App\DTO\LoginDTO;
use Illuminate\Foundation\Http\FormRequest;

/**
 * @property string $email
 * @property string $password
 */
class LoginFormRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => ['required', 'email:dns', 'exists:users,email'],
            'password' => ['required'],
        ];
    }

    public function getDTO(): LoginDTO
    {
        return  new LoginDTO(
            email: $this->email,
            password: $this->password,
        );
    }
}
