<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\UserRequest;
use App\Http\Requests\Register;
use Illuminate\Http\Request;
use App\HttpResponses;
use App\Models\User;


class UserController extends Controller
{
    use HttpResponses;

    public function register(Register $request) {
        try {
            $userInfo = $request->validated();
            $userInfo['password'] = Hash::make($userInfo['password']);
            $user = User::create($userInfo);
            return $this->success(['user' => new UserResource($user),], 'User registered successfully', 201);
        } catch (\Exception $e) {
            return $this->error(null, 'Registration failed. Please try again.', 500);
        }    
    }
    

    

    public function index(){
        $user = Auth::user();
        if (!$user) {
            return $this->error([], 'User not found', 404);
        }
        return $this->success(new UserResource($user), 'User data retrieved successfully', 200);
    }



    public function edit(UserRequest $request, $id){    
        $request->merge(['case' => 'case_1']);

        $user = User::findOrFail($id);
        //$user = $request->user();
        if (!$user) {
            return $this->error([], 'User not found', 404);
        }
        $userInfo = $request->all();
        $userInfo['password'] = Hash::make($userInfo['password']);
        $user -> update($userInfo);
        return $this->success([
            'user' => new UserResource($user),
        ], 'User profile updated successfully', 200);
    }

    public function delete(Request $request){
        $user = Auth::user();
        if (!$user) {
            return $this->error([], 'User not found', 404);
        }
        $request ->user()->delete();
        return $this->success(['message' => 'User account deleted successfully'],  200);
    }


    public function login(LoginRequest $request)
    {
        $request->validated($request->only(['email', 'password']));

        if (!Auth::attempt($request->only(['email', 'password']))) {
            return $this->error('', 'Credentials do not match', 401);
        }

        $user = User::where('email', $request->email)->first();

        return $this->success([
            'user' => $user,
            'token' => $user->createToken('API Token')->plainTextToken
        ], 'You have logged in successfully', 200);
    
    }



    public function logout(Request $request){
        $user = $request->user();
        if ($user) {
            $user->currentAccessToken()->delete();
            return $this->success([
                'message' => 'You have successfully been logged out',
            ], 200);
        }
        return $this->error(['message' => 'You are not logged in'], 401);
    }

}