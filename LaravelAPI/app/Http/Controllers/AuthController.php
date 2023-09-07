<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    //
    public function register( Request $request): JsonResponse
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
            'role' => 'in:admin,user',
        ]);




        // Set default role to 'admin' if not provided in the request
        $userData = array_merge($data, ['role' => $data['role'] ?? 'user']);

        $userData['password'] = bcrypt($userData['password']);
        // Mass assign the validated request data to a new instance of the User model
        $user = User::create($userData);
        $token = $user->createToken('my-token')->plainTextToken;

        return response()->json([
            'token' =>$token,
            'Type' => 'Bearer'
        ]);
    }

    public function login(Request $request): JsonResponse
    {
        $fields = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $user = User::where('email', $fields['email'])->first();

        if (!$user || !Hash::check($fields['password'], $user->password)) {
            return response()->json([
                'message' => 'Wrong credentials'
            ]);
        }

        $token = $user->createToken('my-token')->plainTextToken;

        return response()->json([
            'token' => $token,
            'Type' => 'Bearer',
            'role' => $user->role // include user role in response
        ]);
    }

    public function userInfo(): JsonResponse
    {

        $user = auth()->user();

        return response()->json(['user' => $user], 200);

    }

    // You could basically write some functional code here to
// perform these operations
    public function show(){
        $user = user::all();

        return response()->json(['user' => $user], 200);

    }

    public function update(Request $request, int $id){
        $input = $request->all();

        $user = User::find($id);

        $validator = Validator::make($input, [
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => '',
            'role' => 'in:admin,user',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $user->name = $input['name'];
        $user->email = $input['email'];
        $user->role = $input['role'] ?? 'user';
        $user->password = bcrypt($input['password']);

        // Mass assign the validated request data to a new instance of the User model

        $user->update();

        //return $this->sendResponse('User updated successfully.', json_decode($user));
        return response()->json(['user' => $user], 200);

    }

    public function logout(Request $request): JsonResponse
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json([
            'message' => 'Logged out'
        ]);
    }

    public function deleteCurrentUser(): JsonResponse
    {
        // Get the currently authenticated user
        $user = auth()->user();

        if (!$user) {

            // If there's no authenticated user, return an error response
            return response()->json(['message' => 'User not found'], 404);
        }

        // Delete the user
        $user->delete();

        return response()->json(['message' => 'User deleted successfully']);
    }

    // delete a user by id

    public function deleteUserById($id): JsonResponse
    {
        // Get the currently authenticated user
        $user = User::find($id);

        if (!$user) {

            // If there's no authenticated user, return an error response
            return response()->json(['message' => 'User not found'], 404);
        }

        // Delete the user
        $user->delete();

        return response()->json(['message' => 'User deleted successfully']);
    }

}
