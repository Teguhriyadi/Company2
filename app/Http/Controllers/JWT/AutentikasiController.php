<?php

namespace App\Http\Controllers\JWT;

use App\Http\Controllers\Controller;
use App\Http\Requests\ValidateUserLogin;
use App\Http\Resources\User as ResourcesUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;

class AutentikasiController extends Controller
{
    public function __construct() {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|between:2,100',
            'last_name' => 'required|string|between:2,100',
            'email' => 'required|string|email|max:100|unique:users',
            'password' => 'required|string|min:6',
        ]);
        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }
        $user = User::create(array_merge(
            $validator->validated(),
            [
                'nama' => $request->first_name.$request->last_name,
                'password' => bcrypt($request->password),
                'id_role' => 2,
                'foto' => "",
                'created_by' => 1
                ]
            ));
            return response()->json([
                'success' => true,
                'message' => 'User successfully registered',
                'user' => $user
            ], 201);
        }

        public function login(Request $request)
        {
            $validator = Validator::make($request->all(), [
                'email' => 'required|email',
                'password' => 'required|string|min:6',
            ]);
            if ($validator->fails()) {
                return response()->json($validator->errors(), 422);
            }
            if (! $token = auth()->attempt($validator->validated())) {
                return response()->json(['error' => 'Unauthorized'], 401);
            }
            return $this->createNewToken($token);
        }

        protected function createNewToken($token){
            return response()->json([
                'success' => true,
                'access_token' => $token,
                'token_type' => 'bearer',
                'expires_in' => 60,
                'user' => auth()->user()
            ]);
        }

        public function refresh() {
            return $this->createNewToken(auth()->refresh());
        }

        public function userProfile() {
            return response()->json(auth()->user());
        }

        public function logout() {
            auth()->logout();
            return response()->json(['message' => 'User successfully signed out']);
        }
    }
