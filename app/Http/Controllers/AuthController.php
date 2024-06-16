<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Validation\ValidationException;
use Exception;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        try {
            $this->validate($request, [
                'username' => 'required|string|unique:pengguna',
                'password' => 'required|string|confirmed',
                'alamat' => 'required|string',
                'email' => 'required|string|email|unique:pengguna',
            ]);

            $pengguna = User::create([
                'username' => $request->username,
                'password' => Hash::make($request->password),
                'alamat' => $request->alamat,
                'email' => $request->email,
            ]);

            $token = JWTAuth::fromUser($pengguna);

            return response()->json(compact('pengguna', 'token'), 201);
        } catch (ValidationException $e) {
            return response()->json(['error' => $e->errors()], 422);
        } catch (Exception $e) {
            return response()->json(['error' => 'Could not register user, please try again.'], 500);
        }
    }

    public function login(Request $request)
    {
        try {
            $credentials = $request->only('username', 'password');

            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'Invalid credentials'], 401);
            }

            return response()->json(compact('token'));
        } catch (JWTException $e) {
            return response()->json(['error' => 'Could not create token, please try again.'], 500);
        } catch (Exception $e) {
            return response()->json(['error' => 'An error occurred during login, please try again.'], 500);
        }
    }

    public function logout()
    {
        try {
            Auth::logout();
            return response()->json(['message' => 'Successfully logged out']);
        } catch (Exception $e) {
            return response()->json(['error' => 'Failed to log out, please try again.'], 500);
        }
    }

    public function me()
    {
        try {
            return response()->json(auth()->user());
        } catch (Exception $e) {
            return response()->json(['error' => 'Failed to retrieve user information, please try again.'], 500);
        }
    }
}
