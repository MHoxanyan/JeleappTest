<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginFormRequest;
use App\Services\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function __invoke(LoginFormRequest $request)
    {
        $token = User::login($request->getDTO());

        return response()->json([
            'status' => (bool) $token,
            'token' => $token
        ]);
    }
}
