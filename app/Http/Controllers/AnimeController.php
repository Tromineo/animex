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
        $this->middleware('auth:api', ['except' => ['index', 'show']]);

    }


    /**
     * Retorna todos os animes presentes na base de dados.
     * 
     * A resposta pode ser paginada. Se a query string "por_pagina" for passada, a resposta
     * retorna os animes paginados com o valor especificado. Caso n o seja passado, a resposta
     * retorna todos os animes.
     * 
     * @param Request $request A requisi o HTTP.
     * 
     * @return JsonResponse A resposta JSON com os animes.
     */
    public function index(Request $request)
    {
        $paginacao = $request->query('por_pagina');
        if ($paginacao) {
            $animes = $this->model->paginate($paginacao);
        } else {
            $animes = $this->model->all();
        }
        
        return response()->json($animes, Response::HTTP_OK);
    }

    /**
    * Exibe os detalhes de um animê específico a partir da id fornecida na requisição.
    *
    * @param int $id A id do animê que será exibido.
    *
    * @return \Illuminate\Http\JsonResponse Retorna uma resposta JSON com os detalhes do animê e status 200 em caso de sucesso.
    *
    * @throws \Illuminate\Database\Eloquent\ModelNotFoundException Se o animê com a id fornecida não for encontrado.
    */
    public function show(int $id): JsonResponse
    {
        $result = Anime::find($id);

        if (!$result) {
            return response()->json(['message' => 'Resource not found'], 404);
        }
        
        // Return the resource as JSON
        return response()->json($result);
    }

    /**
    * Cria um novo animê com os dados recebidos.
    *
    * @param \Illuminate\Http\Request $request A requisição contendo os dados para criar um novo animê. Deve incluir os seguintes campos:
    *      - 'titulo': string, obrigatório, máximo de 255 caracteres.
    *      - 'genero': string, obrigatório, máximo de 255 caracteres.
    *      - 'resumo': string, opcional, máximo de 255 caracteres.
    *      - 'episodios': integer, obrigatório.
    *      - 'lancamento': date, opcional.
    *
    * @return \Illuminate\Http\JsonResponse Retorna uma resposta JSON com o animê criado e status 201 em caso de sucesso.
    *
    * @throws \Illuminate\Validation\ValidationException Se os dados de entrada não forem válidos.
    */
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

    /**
    * Exclui um animê específico a partir de uma Id fornecida na requisição. É softdelet.
    *
    * @param \Illuminate\Http\Request $request A requisição contendo a Id do animê a ser excluído.
    *      - 'id': integer, obrigatório. A id do animê que será excluído.
    *
    * @return \Illuminate\Http\JsonResponse Retorna uma resposta JSON com a Id do animê excluído e status 200 em caso de sucesso, ou false e status 204 se o ID não for válido.
    *
    * @throws \Illuminate\Database\Eloquent\ModelNotFoundException Se o animê com a Id fornecido não for encontrado.
    */
    public function delete(Request $request): JsonResponse
    {
        $id = $request->id;
        $id = filter_var($id, FILTER_VALIDATE_INT);

        if ($id !== false) {
            
        } else {
            return response()->json(false, 204);
        }

        $anime = Anime::find($id);
        $anime->delete();
        return response()->json($id,200);
    
    }

    /**
    * Atualiza um anime existente.
    *
    * @param \Illuminate\Http\Request $request A requisição contendo os dados para atualização. Deve incluir os seguintes campos:
    *      - 'titulo': string, opcional, máximo de 255 caracteres.
    *      - 'genero': string, opcional, máximo de 255 caracteres.
    *      - 'resumo': string, opcional, máximo de 255 caracteres.
    *      - 'episodios': integer, opcional.
    *      - 'lancamento': date, opcional.
    *
    * @return JsonResponse Retorna uma resposta JSON com uma mensagem de sucesso e o recurso atualizado.
    *
    * @throws ValidationException Se os dados de entrada não forem válidos.
    * @throws ModelNotFoundException Se o recurso com o ID fornecido não for encontrado.
    */
    public function update(Request $request): JsonResponse
    {
        // Validate the incoming request data
        $validatedData = $this->validate($request, [
            'titulo' => 'string|max:255',
            'genero' => 'string|max:255',
            'resumo' => 'string|max:255',
            'episodios' => 'integer',
            'lancamento' => 'date'
        ]);
        
        $resource = Anime::findOrFail($request->id);
        $resource->update($validatedData);
        
        return response()->json([
            'message' => 'Anime atualizado',
            'resource' => $resource,
        ], 200);
    }

    //
}
