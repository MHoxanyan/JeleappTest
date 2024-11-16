<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\User\ProfileResource;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Handle the incoming request for user profile.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        return ProfileResource::make($request->user());
    }
}
