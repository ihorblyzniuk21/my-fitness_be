<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Resources\AuthTokenResource;
use App\Http\Resources\ProfileResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        try {
            $user = User::create($request->all());
            $token = new AuthTokenResource($user->createToken(''));

            return response()->json($token);
        } catch (\Exception $ex) {
            return response()->json([
                'message' => 'Could not register user.',
                'exception' => $ex->getMessage()
            ], 500);
        }
    }


    public function login(LoginRequest $request)
    {
        try {
            if (!Auth::attempt($request->validated())) {
                return response()->noContent(401);
            }

            $token = new AuthTokenResource($request->user()->createToken(''));

            return response()->json($token);
        } catch (\Exception $ex) {
            return response()->json([
                'message' => 'Could not login user.',
                'exception' => $ex->getMessage()
            ], 500);
        }
    }

    public function logout(Request $request)
    {
        try {
            $request->user()->currentAccessToken()->delete();

            return response()->noContent();
        } catch (\Exception $ex) {
            return response()->json([
                'message' => 'Could not logout user.',
                'exception' => $ex->getMessage()
            ], 500);
        }
    }

    public function profile(Request $request)
    {
        try {
            return response()->json(new ProfileResource($request->user()));
        } catch (\Exception $ex) {
            return response()->json([
                'message' => 'Could not get profile.',
                'exception' => $ex->getMessage()
            ], 500);
        }
    }
}
