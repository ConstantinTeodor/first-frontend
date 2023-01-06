<?php

namespace App\Http\Controllers;

use App\Models\Masina;
use App\Services\MasinaService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MasinaController extends Controller
{
    private MasinaService $masinaService;
    public function __construct(MasinaService $masinaService)
    {
        $this->masinaService = $masinaService;
    }

    /**
     * @OA\Get(
     *    path="/masini",
     *    summary="Returneaza toate masinile",
     *    tags={"Masini"},
     *    description="Returneaza toate masinile",
     *   @OA\Response(
     *        response=200,
     *        description="Success"
     *    )
     * )
     */
    public function index(): JsonResponse
    {
        $data = Masina::all();
        return response()->json($data, Response::HTTP_OK);
    }

    /**
     * @OA\Get(
     *    path="/masini/{id}",
     *    summary="Returneaza masina cu id-ul dat",
     *    tags={"Masini"},
     *    description="Returneaza masina cu id-ul dat",
     *    @OA\Parameter(
     *        name="id",
     *        description="Id-ul masinii dorite",
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
        $data = Masina::where('idMasina', '=', $id)->firstOrFail();
        return response()->json($data, Response::HTTP_OK);
    }

    /**
     * @OA\Put(
     *    path="/masini",
     *    summary="Update masina cu id-ul dat",
     *    tags={"Masini"},
     *    description="Update masina cu id-ul dat",
     *     @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(
     *              @OA\Property(
     *                  property="idMasina",
     *                  type="integer",
     *                  description="",
     *                  example=1,
     *              ),
     *              @OA\Property(
     *                  property="idLocatieActuala",
     *                  type="integer",
     *                  description="",
     *                  example=1,
     *              ),
     *              @OA\Property(
     *                  property="categorie",
     *                  type="string",
     *                  description="",
     *                  example="Economy",
     *              ),
     *              @OA\Property(
     *                  property="marca",
     *                  type="string",
     *                  description="",
     *                  example="Volkswagen",
     *              ),
     *              @OA\Property(
     *                  property="model",
     *                  type="string",
     *                  description="",
     *                  example="Golf",
     *              ),
     *              @OA\Property(
     *                  property="anFabricatie",
     *                  type="integer",
     *                  description="",
     *                  example=2023,
     *              ),
     *              @OA\Property(
     *                  property="serieSasiu",
     *                  type="string",
     *                  description="",
     *                  example="NR916E9LP5",
     *              ),
     *              @OA\Property(
     *                  property="serieCarteIdentitate",
     *                  type="string",
     *                  description="",
     *                  example="3DEO7J5B7V",
     *              ),
     *              @OA\Property(
     *                  property="nrInmatriculare",
     *                  type="string",
     *                  description="",
     *                  example="B 20 FIR",
     *              ),
     *              @OA\Property(
     *                  property="tipMotor",
     *                  type="string",
     *                  description="",
     *                  example="Benzina",
     *              ),
     *              @OA\Property(
     *                  property="tipTransmisie",
     *                  type="string",
     *                  description="",
     *                  example="manuala",
     *              ),
     *              @OA\Property(
     *                  property="nrPasageri",
     *                  type="integer",
     *                  description="",
     *                  example=7,
     *              ),
     *              @OA\Property(
     *                  property="nrUsi",
     *                  type="integer",
     *                  description="",
     *                  example=5,
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
        $data = Masina::where('idMasina', '=', $request['idMasina'])->firstOrFail();
        $this->masinaService->setProperties($data, $request->all());
        $data->save();
        return response()->json($data, Response::HTTP_OK);
    }

    /**
     * @OA\Post(
     *    path="/masini",
     *    summary="Adauga masina",
     *    tags={"Masini"},
     *    description="Adauga masina",
     *     @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(
     *              @OA\Property(
     *                  property="idLocatieActuala",
     *                  type="integer",
     *                  description="",
     *                  example=1,
     *              ),
     *              @OA\Property(
     *                  property="categorie",
     *                  type="string",
     *                  description="",
     *                  example="Economy",
     *              ),
     *              @OA\Property(
     *                  property="marca",
     *                  type="string",
     *                  description="",
     *                  example="Volkswagen",
     *              ),
     *              @OA\Property(
     *                  property="model",
     *                  type="string",
     *                  description="",
     *                  example="Golf",
     *              ),
     *              @OA\Property(
     *                  property="anFabricatie",
     *                  type="integer",
     *                  description="",
     *                  example=2023,
     *              ),
     *              @OA\Property(
     *                  property="serieSasiu",
     *                  type="string",
     *                  description="",
     *                  example="NR916E9LP5",
     *              ),
     *              @OA\Property(
     *                  property="serieCarteIdentitate",
     *                  type="string",
     *                  description="",
     *                  example="3DEO7J5B7V",
     *              ),
     *              @OA\Property(
     *                  property="nrInmatriculare",
     *                  type="string",
     *                  description="",
     *                  example="B 20 FIR",
     *              ),
     *              @OA\Property(
     *                  property="tipMotor",
     *                  type="string",
     *                  description="",
     *                  example="Benzina",
     *              ),
     *              @OA\Property(
     *                  property="tipTransmisie",
     *                  type="string",
     *                  description="",
     *                  example="manuala",
     *              ),
     *              @OA\Property(
     *                  property="nrPasageri",
     *                  type="integer",
     *                  description="",
     *                  example=7,
     *              ),
     *              @OA\Property(
     *                  property="nrUsi",
     *                  type="integer",
     *                  description="",
     *                  example=5,
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
        $data = new Masina;
        $this->masinaService->setProperties($data, $request->all());
        $data->save();
        return response()->json($data, Response::HTTP_OK);
    }

    /**
     * @OA\Delete(
     *    path="/masini/{id}",
     *    summary="Sterge masina cu id-ul dat",
     *    tags={"Masini"},
     *    description="Sterge masina cu id-ul dat",
     *    @OA\Parameter(
     *        name="id",
     *        description="Id-ul masinii dorite",
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
        $data = Masina::where('idMasina', '=', $id)->firstOrFail();
        $data->delete();
        return response()->json("DELETED", Response::HTTP_OK);
    }
}
