<?php

namespace App\Http\Controllers;

use App\Http\Requests\MasiniViewRequest;
use App\Models\Masina;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class MasinaController extends Controller
{
    public function _construct()
    {
        //
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
        $data = Masina::where('idMasina', '=', $id)->get();
        return response()->json($data, Response::HTTP_OK);
    }

    public function update($id): JsonResponse
    {
        
    }
}
