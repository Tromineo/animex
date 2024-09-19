<?php 

namespace App\Http\Controllers;

use App\Models\User;
use Laravel\Lumen\Routing\Controller as BaseController;

class UserController extends BaseController
{
    public function me()
    {
        return response()->json(auth()->user());
    }

    public function getUsers()
    {
        return response()->json(['list'=>User::all()]);
    }
}