<?php

namespace App\Http\Controllers\API\Autentikasi;

use App\Http\Controllers\Controller;
use App\Http\Resources\User;
use App\Models\User as ModelsUser;

class AppController extends Controller
{
    public function index()
    {
        $user = ModelsUser::find(1);

        $token = $user->createToken("ApiToken")->plainTextToken;

        $response = [
            "success" => true,
            "user" => $user,
            "token" => $token
        ];

        return response($response, 201);
    }
}
