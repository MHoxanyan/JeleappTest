<?php

namespace App\Services;

use App\DTO\LoginDTO;
use App\DTO\UserRegisterDTO;
use Illuminate\Support\Facades\Hash;

class User
{
    public static function register(UserRegisterDTO $DTO): ?\App\Models\User
    {
        return \App\Models\User::create([
            'name' => $DTO->name,
            'email' => $DTO->email,
            'password' => Hash::make($DTO->password),
            'gender' => $DTO->gender,
        ]);
    }

    public static function login(LoginDTO $DTO): ?string
    {
        $user = \App\Models\User::where('email', $DTO->email)->first();
        if (Hash::check($DTO->password, $user->password)) {
            return $user->createToken('token')->plainTextToken;
        }
        return null;
    }
}
