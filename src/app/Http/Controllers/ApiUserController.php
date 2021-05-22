<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApiUserRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ApiUserController extends Controller
{
    //
    public function register(ApiUserRequest $request) {
        $user = new User;
        $user->fill($request->all());
        $user->password = Hash::make($request->password);

        $user->save();

        return response()->json($user);
    }
}
