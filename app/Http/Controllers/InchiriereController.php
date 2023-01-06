<?php

namespace App\Http\Controllers;

use App\Models\Inchiriere;
use App\Services\InchiriereService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class InchiriereController extends Controller
{
    private InchiriereService $inchiriereService;
    public function __construct(InchiriereService $inchiriereService)
    {
        $this->inchiriereService = $inchiriereService;
    }

    /**
     * @OA\Get(
     *    path="/inchirieri",
     *    summary="Returneaza toate inchirierile",
     *    tags={"Inchirieri"},
     *    description="Returneaza toate inchirierile",
     *   @OA\Response(
     *        response=200,
     *        description="Success"
     *    )
     * )
     */
    public function index(): JsonResponse
    {
        $data = Inchiriere::all();
        return response()->json($data, Response::HTTP_OK);
    }

    /**
     * @OA\Get(
     *    path="/inchirieri/{id}",
     *    summary="Returneaza inchirierea cu id-ul dat",
     *    tags={"Inchirieri"},
     *    description="Returneaza inchirierea cu id-ul dat",
     *    @OA\Parameter(
     *        name="id",
     *        description="Id-ul inchirierii dorit",
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
        $data = Inchiriere::where('idInchiriere', '=', $id)->firstOrFail();
        return response()->json($data, Response::HTTP_OK);
    }

    /**
     * @OA\Put(
     *    path="/inchirieri",
     *    summary="Update inchirierea cu id-ul dat",
     *    tags={"Inchirieri"},
     *    description="Update inchirierea cu id-ul dat",
     *     @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(
     *              @OA\Property(
     *                  property="idInchiriere",
     *                  type="integer",
     *                  description="",
     *                  example=1,
     *              ),
     *              @OA\Property(
     *                  property="idClient",
     *                  type="integer",
     *                  description="",
     *                  example=1,
     *              ),
     *              @OA\Property(
     *                  property="idMasina",
     *                  type="integer",
     *                  description="",
     *                  example=1,
     *              ),
     *              @OA\Property(
     *                  property="dataInchiriere",
     *                  type="date",
     *                  description="",
     *                  example="2022-10-17",
     *              ),
     *              @OA\Property(
     *                  property="dataPredareLimita",
     *                  type="date",
     *                  description="",
     *                  example="2022-10-23",
     *              ),
     *              @OA\Property(
     *                  property="dataPredareEfectiva",
     *                  type="date",
     *                  description="",
     *                  example="2022-10-23",
     *              ),
     *              @OA\Property(
     *                  property="idLocatieInchiriere",
     *                  type="integer",
     *                  description="",
     *                  example=5,
     *              ),
     *              @OA\Property(
     *                  property="idLocatiePredare",
     *                  type="integer",
     *                  description="",
     *                  example=3,
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
        $data = Inchiriere::where('idInchiriere', '=', $request['idInchiriere'])->firstOrFail();
        $this->inchiriereService->setProperties($data, $request->all());
        $data->save();
        return response()->json($data, Response::HTTP_OK);
    }

    /**
     * @OA\Post(
     *    path="/inchirieri",
     *    summary="Adauga inchirierea",
     *    tags={"Inchirieri"},
     *    description="Adauga inchirierea",
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
     *                  property="idMasina",
     *                  type="integer",
     *                  description="",
     *                  example=1,
     *              ),
     *              @OA\Property(
     *                  property="dataInchiriere",
     *                  type="date",
     *                  description="",
     *                  example="2022-10-17",
     *              ),
     *              @OA\Property(
     *                  property="dataPredareLimita",
     *                  type="date",
     *                  description="",
     *                  example="2022-10-23",
     *              ),
     *              @OA\Property(
     *                  property="dataPredareEfectiva",
     *                  type="date",
     *                  description="",
     *                  example="2022-10-23",
     *              ),
     *              @OA\Property(
     *                  property="idLocatieInchiriere",
     *                  type="integer",
     *                  description="",
     *                  example=5,
     *              ),
     *              @OA\Property(
     *                  property="idLocatiePredare",
     *                  type="integer",
     *                  description="",
     *                  example=3,
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
        $data = new Inchiriere;
        $this->inchiriereService->setProperties($data, $request->all());
        $data->save();
        return response()->json($data, Response::HTTP_OK);
    }

    /**
     * @OA\Delete(
     *    path="/inchirieri/{id}",
     *    summary="Sterge inchirierea cu id-ul dat",
     *    tags={"Inchirieri"},
     *    description="Sterge inchirierea cu id-ul dat",
     *    @OA\Parameter(
     *        name="id",
     *        description="Id-ul inchirierii dorite",
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
        $data = Inchiriere::where('idInchiriere', '=', $id)->firstOrFail();
        $data->delete();
        return response()->json("DELETED", Response::HTTP_OK);
    }
}
