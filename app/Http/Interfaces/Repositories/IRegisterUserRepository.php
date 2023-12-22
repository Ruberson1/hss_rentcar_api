<?php

namespace App\Http\Interfaces\Repositories;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

interface IRegisterUserRepository
{
    public function register(Request $request): Response;
}
