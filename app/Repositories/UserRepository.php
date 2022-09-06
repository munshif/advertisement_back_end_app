<?php

namespace App\Repositories;

use App\Interfaces\UserInterface;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class UserRepository implements UserInterface
{

    // Use api response trait.
    use ApiResponse;

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @author mohamedmunshif
     * @description signup function implementation
     */
    public function registerNewUser(Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            //user registration validation
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'required|email|unique:users,email',
                'password' => 'required',
                'c_password' => 'required|same:password',
            ]);

            // if validation fails
            if ($validator->fails()) {
                return $this->errorResponse($validator->errors());
            }

            //create new user
            $input = $request->all();
            $input['name'] ='test';
            $input['password'] = \Hash::make($request->password);
            $user = User::create($input);

            $data['token'] = $user->createToken('MyApp')->plainTextToken;
            $data['name'] = $user->name;

            return $this->successResponse('User Created Successfully', $data, 200);

        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage(), 500);
        }
    }


    /**
     * @param $request
     * @return \Illuminate\Http\JsonResponse
     * @author mohamedmunshif
     * @description function to log-in and create token implementation
     */
    public function login($request): \Illuminate\Http\JsonResponse
    {
        try {
            //Checking for email and password
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                $user = Auth::user();
                $data['token'] = $user->createToken('MyApp')->plainTextToken;
                $data['name'] = $user->name;

                return $this->successResponse('User login successfully.', $data);

            } else {
                return $this->errorResponse('Login Failed! Unauthorised Access.');
            }
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage());
        }
    }


    /**
     * @return \Illuminate\Http\JsonResponse
     * @author mohamedmunshif
     * @description logout function implementation
     */
    public function logout(): \Illuminate\Http\JsonResponse
    {
        auth()->user()->tokens()->delete();

        return $this->successResponse('User Logged Out successfully.',[]);
    }
}
