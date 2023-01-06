<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Services\ClientService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ClientController extends Controller
{
    private ClientService $clientService;
    public function __construct(clientService $clientService)
    {
        $this->clientService = $clientService;
    }

    /**
     * @OA\Get(
     *    path="/clienti",
     *    summary="Returneaza toti clientii",
     *    tags={"Clienti"},
     *    description="Returneaza toti clientii",
     *   @OA\Response(
     *        response=200,
     *        description="Success"
     *    )
     * )
     */
    public function index(): JsonResponse
    {
        $data = Client::all();
        return response()->json($data, Response::HTTP_OK);
    }

    /**
     * @OA\Get(
     *    path="/clienti/{id}",
     *    summary="Returneaza clientul cu id-ul dat",
     *    tags={"Clienti"},
     *    description="Returneaza clientul cu id-ul dat",
     *    @OA\Parameter(
     *        name="id",
     *        description="Id-ul clientului dorit",
     *        required=true,
     *        in="path",
     *        example=30,
     *        @OA\Schema(
     *            type="integer"
     *        )
     *    ),
     *   @OA\Response(
     *        response=200,
     *        description="Success"
     *    )
     * )
     */
    public function show($id): JsonResponse
    {
        $data = Client::where('idClient', '=', $id)->firstOrFail();
        return response()->json($data, Response::HTTP_OK);
    }

    /**
     * @OA\Put(
     *    path="/clienti",
     *    summary="Update clientul cu id-ul dat",
     *    tags={"Clienti"},
     *    description="Update clientul cu id-ul dat",
     *     @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(
     *              @OA\Property(
     *                  property="idClient",
     *                  type="integer",
     *                  description="",
     *                  example=1,
     *              ),
     *              @OA\Property(
     *                  property="$CNP",
     *                  type="string",
     *                  description="",
     *                  example="2821205341248",
     *              ),
     *              @OA\Property(
     *                  property="$nume",
     *                  type="string",
     *                  description="",
     *                  example="Popescu",
     *              ),
     *              @OA\Property(
     *                  property="$prenume",
     *                  type="string",
     *                  description="",
     *                  example="Maria",
     *              ),
     *              @OA\Property(
     *                  property="$nrTelefon",
     *                  type="string",
     *                  description="",
     *                  example="+40744055645",
     *              ),
     *              @OA\Property(
     *                  property="$email",
     *                  type="string",
     *                  description="",
     *                  example="popescu_maria01@gmail.com",
     *              )
     *          )
     *     ),
     *   @OA\Response(
     *        response=200,
     *        description="Success"
     *    )
     * )
     */
    public function update(Request $request): JsonResponse
    {
        $data = Client::where('idClient', '=', $request['idClient'])->firstOrFail();
        $this->clientService->setProperties($data, $request->all());
        $data->save();
        return response()->json($data, Response::HTTP_OK);
    }

    /**
     * @OA\Post(
     *    path="/clienti",
     *    summary="Adauga clientul",
     *    tags={"Clienti"},
     *    description="Adauga clientul",
     *     @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(
     *              @OA\Property(
     *                  property="$CNP",
     *                  type="string",
     *                  description="",
     *                  example="2821205341248",
     *              ),
     *              @OA\Property(
     *                  property="$nume",
     *                  type="string",
     *                  description="",
     *                  example="Popescu",
     *              ),
     *              @OA\Property(
     *                  property="$prenume",
     *                  type="string",
     *                  description="",
     *                  example="Maria",
     *              ),
     *              @OA\Property(
     *                  property="$nrTelefon",
     *                  type="string",
     *                  description="",
     *                  example="+40744055645",
     *              ),
     *              @OA\Property(
     *                  property="$email",
     *                  type="string",
     *                  description="",
     *                  example="popescu_maria01@gmail.com",
     *              )
     *          )
     *     ),
     *   @OA\Response(
     *        response=200,
     *        description="Success"
     *    )
     * )
     */
    public function store(Request $request): JsonResponse
    {
        $data = new Client;
        $this->clientService->setProperties($data, $request->all());
        $data->save();
        return response()->json($data, Response::HTTP_OK);
    }

    /**
     * @OA\Delete(
     *    path="/clienti/{id}",
     *    summary="Sterge clientul cu id-ul dat",
     *    tags={"Clienti"},
     *    description="Sterge clientul cu id-ul dat",
     *    @OA\Parameter(
     *        name="id",
     *        description="Id-ul clientului dorit",
     *        required=true,
     *        in="path",
     *        example=30,
     *        @OA\Schema(
     *            type="integer"
     *        )
     *    ),
     *   @OA\Response(
     *        response=200,
     *        description="Success"
     *    )
     * )
     */
    public function destroy($id): JsonResponse
    {
        $data = Client::where('idClient', '=', $id)->firstOrFail();
        $data->delete();
        return response()->json("DELETED", Response::HTTP_OK);
    }
}
