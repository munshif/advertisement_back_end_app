<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Interfaces\UserInterface;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userInterface;

    /**
     * @param UserInterface $userInterface
     */
    public function __construct(UserInterface $userInterface)
    {
        $this->userInterface = $userInterface;
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @author mohamedmunshif
     * @description store user information
     */
    public function store(Request $request): \Illuminate\Http\JsonResponse
    {
        return $this->userInterface->registerNewUser($request);
    }


    /**
     * @param Request $request
     * @return mixed
     * @author mohamedmunshif
     * @description function to login and generate token
     */
    public function login(Request $request): mixed
    {
        return $this->userInterface->login($request);
    }


    /**
     * @return mixed
     * @author mohamedmunshif
     * @description User logout function
     */
    public function logout(): mixed
    {
        return $this->userInterface->logout();
    }

}
