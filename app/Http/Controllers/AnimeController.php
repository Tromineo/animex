<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use App\Models\Anime;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use PHPUnit\Util\Json;

class AnimeController extends Controller
{

    private $model;

    public function __construct(Anime $anime)
    {
        $this->model = $anime;
    }

    public function index()
    {

    }

    public function getAll()
    {
        $animes = $this->model->all();
        return response()->json($animes, Response::HTTP_OK);
    }

    public function show(int $id): JsonResponse
    {
    
        $result = Anime::find($id);

        if (!$result) {
            return response()->json(['message' => 'Resource not found'], 404);
        }
        
        // Return the resource as JSON
        return response()->json($result);
    }

    public function create(Request $request): JsonResponse
    {
    
        $anime = Anime::create([
            'titulo' => $request->input('titulo'),
            'resumo' => $request->input('resumo'),
            'episodios' => $request->input('episodios'),
            'genero' => $request->input('genero'),
            'lancamento' => $request->input('lancamento'),
        ]);

        return response()->json($anime, 201);

    }

    //
}
