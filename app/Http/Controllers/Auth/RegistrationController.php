<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegistrationFormRequest;
use App\Services\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RegistrationController extends Controller
{
    public function __invoke(RegistrationFormRequest $request)
    {
        $user = User::register($request->getDto());

        return response()->json([
            'status' => (bool) $user,
        ], $user ? Response::HTTP_CREATED : Response::HTTP_INTERNAL_SERVER_ERROR);
    }
}
