<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Responses\SuccessResponse;
use App\Http\Requests\UserRegisterRequest;

class UserController extends Controller
{
    private $user;

    public function __construct()
    {
        $this->user = new User;
    }

    public function registerUser(UserRegisterRequest $request)
    {
        $data = $request->validated();
        $create = $this->user->create([
            "name" => $data['name'],
            "email" => $data['email'],
            "password" => Hash::make($data['password']),
        ]);
        return new SuccessResponse('Registered Successfully..!');
    }
}
