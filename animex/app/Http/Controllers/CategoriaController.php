<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;

class CategoriaController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function index()
    {
                // Example data
                $categories = [
                    ['id' => 1, 'name' => 'Technology'],
                    ['id' => 2, 'name' => 'Health'],
                    ['id' => 3, 'name' => 'Science']
                ];
        
                return response()->json($categories, Response::HTTP_OK);
    }

    //
}
