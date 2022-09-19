<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function my(Request $reques)
    {
        return $reques->user();
    }

    public function logon(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => 'required|unique:users',
            'password' => 'required',
        ]);
        if($validator->fails()){
            return $validator->errors()->first();
        }
        $data = $validator->validated();
        $data['name'] = $data['name'] ?? $data['email'];
        return User::create($data);
    }

    public function login(Request $request)
    {
        $user = \App\Models\User::firstOrCreate(['email' => '312823281@qq.com'], [
            'name' => 'test',
            'password' => 'test',
        ]);
        dd($user->createToken('login'));
    }
}
