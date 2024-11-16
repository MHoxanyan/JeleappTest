<?php

namespace App\Http\Requests\Auth;

use App\DTO\UserRegisterDTO;
use App\Enum\GenderType;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * @property string $email
 * @property string $password
 * @property int $gender
 * @property string $name
 */
class RegistrationFormRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['nullable', 'string', 'max:100'],
            'email' => ['required', 'email:dns', 'unique:users,email'],
            'password' => ['required', 'min:8'],
            'gender' => ['required', Rule::enum(GenderType::class)],
        ];
    }

    public function getDTO(): UserRegisterDTO
    {
        return new UserRegisterDTO(
            email: $this->email,
            password: $this->password,
            gender: GenderType::tryFrom($this->gender),
            name: $this->name,
        );
    }
}
