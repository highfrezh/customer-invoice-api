<?php

namespace App\Http\Controllers\API\V1;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\V1\StoreUserRequest;

class RegisterController extends Controller
{
    public function Register(StoreUserRequest $request)
    {
        $credential = [
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => $request['password']
        ];

        if(!Auth::attempt($credential)){ 

            $user = new User();
            $user->name = $request['name'];
            $user->email = $request['email'];
            $user->password = Hash::make($request['password']);

            $user->save();

            if(Auth::attempt($credential)){
                $user = Auth::user();

                // $adminToken = $user->createToken('admin-token', ['create','update','delete']);
                // $updateToken = $user->createToken('update-token', ['create','update']);
                $basicToken = $user->createToken('basic-token', ['none']);

                return [
                    // 'admin' => $adminToken->plainTextToken,
                    // 'update' => $updateToken->plainTextToken,
                    'message' => "your registration is successful! please copy and save the token for Authorization",
                    'token' => $basicToken->plainTextToken
                ];
            }
        }else{
            return response()->json([
                "User already registered!",
            ], 200);
        }

    }
}
