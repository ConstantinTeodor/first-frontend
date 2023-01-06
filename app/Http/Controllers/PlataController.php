<?php

namespace App\Http\Controllers;

use App\Models\Plata;
use App\Services\PlataService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PlataController extends Controller
{
    private PlataService $plataService;
    public function __construct(PlataService $plataService)
    {
        $this->plataService = $plataService;
    }

    /**
     * @OA\Get(
     *    path="/plati",
     *    summary="Returneaza toate platile",
     *    tags={"Plati"},
     *    description="Returneaza toate platile",
     *   @OA\Response(
     *        response=200,
     *        description="Success"
     *    )
     * )
     */
    public function index(): JsonResponse
    {
        $data = Plata::all();
        return response()->json($data, Response::HTTP_OK);
    }

    /**
     * @OA\Get(
     *    path="/plati/{id}",
     *    summary="Returneaza plata cu id-ul dat",
     *    tags={"Plati"},
     *    description="Returneaza plata cu id-ul dat",
     *    @OA\Parameter(
     *        name="id",
     *        description="Id-ul platii dorite",
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
        $data = Plata::where('idPlata', '=', $id)->firstOrFail();
        return response()->json($data, Response::HTTP_OK);
    }

    /**
     * @OA\Put(
     *    path="/plati",
     *    summary="Update plata cu id-ul dat",
     *    tags={"Plati"},
     *    description="Update plata cu id-ul dat",
     *     @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(
     *              @OA\Property(
     *                  property="idPlata",
     *                  type="integer",
     *                  description="",
     *                  example=1,
     *              ),
     *              @OA\Property(
     *                  property="tipPlata",
     *                  type="string",
     *                  description="",
     *                  example="cash",
     *              ),
     *              @OA\Property(
     *                  property="idInchiriere",
     *                  type="integer",
     *                  description="",
     *                  example=1,
     *              ),
     *              @OA\Property(
     *                  property="suma",
     *                  type="number",
     *                  description="",
     *                  example=300.9,
     *              ),
     *              @OA\Property(
     *                  property="statusPlata",
     *                  type="string",
     *                  description="",
     *                  example="achitata",
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
        $data = Plata::where('idPlata', '=', $request['idPlata'])->firstOrFail();
        $this->plataService->setProperties($data, $request->all());
        $data->save();
        return response()->json($data, Response::HTTP_OK);
    }

    /**
     * @OA\Post(
     *    path="/plati",
     *    summary="Adauga plata",
     *    tags={"Plati"},
     *    description="Adauga plata",
     *     @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(
     *              @OA\Property(
     *                  property="tipPlata",
     *                  type="string",
     *                  description="",
     *                  example="cash",
     *              ),
     *              @OA\Property(
     *                  property="idInchiriere",
     *                  type="integer",
     *                  description="",
     *                  example=1,
     *              ),
     *              @OA\Property(
     *                  property="suma",
     *                  type="number",
     *                  description="",
     *                  example=300.9,
     *              ),
     *              @OA\Property(
     *                  property="statusPlata",
     *                  type="string",
     *                  description="",
     *                  example="achitata",
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
        $data = new Plata;
        $this->plataService->setProperties($data, $request->all());
        $data->save();
        return response()->json($data, Response::HTTP_OK);
    }

    /**
     * @OA\Delete(
     *    path="/plati/{id}",
     *    summary="Sterge plata cu id-ul dat",
     *    tags={"Plati"},
     *    description="Sterge plata cu id-ul dat",
     *    @OA\Parameter(
     *        name="id",
     *        description="Id-ul platii dorite",
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
        $data = Plata::where('idPlata', '=', $id)->firstOrFail();
        $data->delete();
        return response()->json("DELETED", Response::HTTP_OK);
    }
}
