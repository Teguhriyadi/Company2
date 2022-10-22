<?php

namespace App\Http\Controllers\JWT;

use App\Http\Controllers\Controller;
use App\Http\Requests\ValidateUserLogin;
use App\Http\Resources\User as ResourcesUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;

class AutentikasiController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth:api", ["except" => ["login", "register"]]);
    }

    public function login(ValidateUserLogin $request)
    {
        $credentials = request(["email", "password"]);

        if (!$token = Auth::attempt($credentials)) {
            return response()->json([
                "errors" => [
                    "message" => ["Incorrect Username Atau Password"]
                ]
            ], 401);
        }

        return response()->json([
            "type" => "success",
            "message" => "Logged In",
            "token" => $token
        ]);
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "nama" => "required",
            "email" => "required|string|email|max:100|unique:users",
            "password" => "required"
        ]);

        if ($validator->fails()) {
            return response()->json([$validator->errors()->toJson()], 400);
        }

        $user = User::create(array_merge(
            $validator->validated(),
            [
                "password" => bcrypt($request->password),
                "id_role" => 1,
                "created_by" => 1,
                "foto" => ""
            ]
        ));

        if (!$token = JWTAuth::attempt($request->only("email", "password"))) {
            return response()->json(["error" => "Unauthorized"], 401);
        }

        return $this->createNewToken($token);
    }

    protected function createNewToken($token) {
        return response()->json([
            "access_token" => $token,
            "token_type" => "bearer",
            "user" => Auth::user()
        ]);
    }

    public function getUser(Request $request)
    {
        return response()->json($request->user());
    }

    public function refresh()
    {
        return $this->createNewToken(Auth::refresh());
    }

    public function user()
    {
        return new ResourcesUser(Auth::use());
    }

    public function logout(Request $request)
    {
        $removeToken = $request->user()->tokens()->delete();

        if($removeToken) {
            return response()->json([
                'success' => true,
                'message' => 'Logout Success!',
            ]);
        }
    }
}
