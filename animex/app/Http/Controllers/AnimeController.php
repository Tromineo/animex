<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use App\Models\Anime;

class AnimeController extends Controller
{

    private $model;

    public function __construct(Anime $anime)
    {
        $this->model = $anime;
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

    public function getAll()
    {
        $animes = $this->model->all();
        
        return response()->json($animes, Response::HTTP_OK);
    }

    //
}
