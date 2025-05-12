<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Services\UserService;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function register(CreateUserRequest $request)
    {
        $data = $request->validated();
        $user = $this->userService->register($data);

        return response()->json([
            'message' => 'User registered successfully. Please check your email for activation link.',
            'user' => $user
        ], 201);
    }

    public function registerPage()
    {
        return view('auth.register');
    }


}
