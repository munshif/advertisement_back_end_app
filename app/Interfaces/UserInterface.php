<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface UserInterface
{

    /**
     * @param Request $request
     * @return mixed
     * @author mohamedmunshif
     * @description Signup Function
     */
    public function registerNewUser(Request $request): mixed;

    /**
     * @return mixed
     * @author mohamedmunshif
     * @description User login function
     */
    public function login(Request $request): mixed;


    /**
     * @return mixed
     * @author mohamedmunshif
     * @description User logout function
     * @startOn 2022-09-02
     * @endOn 2022-09-02
     */
    public function logout(): mixed;
}
