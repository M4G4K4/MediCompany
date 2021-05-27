<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Psy\Util\Str;

class AuthController extends Controller
{
    public function register(Request $request){

        if($request->name && $request->email && $request->password != null){

        $user =  User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'api_token' => \Illuminate\Support\Str::random(60),
        ]);

        return response()->json(['status' => 'success', 'api_token' => $user->api_token]);

        }else{
            return response()->json(['status' => 'error']);
        }

    }

    public function login(Request $request){

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = \App\Models\User::where('email', $credentials['email'])->first();
            $user->api_token = \Illuminate\Support\Str::random(60);
            $user->save();

            return response()
                ->json(
                    [
                        'status' => 'success',
                        'api_token' => $user->api_token
                    ],200);
        }

        return response()
            ->json(['status' => 'unauthorized'],401);

    }


    public function getDetails(Request $request){
        $user = $request->user();
        dd($user->patientdetail);
    }
}
