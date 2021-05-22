<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApiLoginRequest;
use App\Http\Requests\ApiRegisterRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ApiUserController extends Controller
{
    //
    public function register(ApiRegisterRequest $request) {
        $user = new User;
        $user->fill($request->all());
        $user->password = Hash::make($request->password);

        $user->save();

        return response()->json($user);
    }

    public function login(ApiLoginRequest $request) {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = User::whereEmail($request->email)->first();
            $user->token = $user->createToken('device_name')->accessToken;
            return  response()->json($user);
        }
        return response()->json(['email' => 'Sai ten dang nhap hoac mat khau'], 401);
    }

    public function userInfo(Request $request) {
        return response()->json(Auth::user());
    }
}
