<?php

namespace App\Http\Controllers;

use App\Models\Locatie;
use App\Services\LocatieService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class LocatieController extends Controller
{
    private LocatieService $locatieService;
    public function __construct(LocatieService $locatieService)
    {
        $this->locatieService = $locatieService;
    }

    /**
     * @OA\Get(
     *    path="/locatii",
     *    summary="Returneaza toate locatiile",
     *    tags={"Locatii"},
     *    description="Returneaza toate locatiile",
     *   @OA\Response(
     *        response=200,
     *        description="Success"
     *    )
     * )
     */
    public function index(): JsonResponse
    {
        $data = Locatie::all();
        return response()->json($data, Response::HTTP_OK);
    }

    /**
     * @OA\Get(
     *    path="/locatii/{id}",
     *    summary="Returneaza locatia cu id-ul dat",
     *    tags={"Locatii"},
     *    description="Returneaza locatia cu id-ul dat",
     *    @OA\Parameter(
     *        name="id",
     *        description="Id-ul locatiaui dorit",
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
        $data = Locatie::where('idLocatie', '=', $id)->firstOrFail();
        return response()->json($data, Response::HTTP_OK);
    }

    /**
     * @OA\Put(
     *    path="/locatii",
     *    summary="Update locatia cu id-ul dat",
     *    tags={"Locatii"},
     *    description="Update locatia cu id-ul dat",
     *     @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(
     *              @OA\Property(
     *                  property="idLocatie",
     *                  type="integer",
     *                  description="",
     *                  example=1,
     *              ),
     *              @OA\Property(
     *                  property="adresa",
     *                  type="string",
     *                  description="",
     *                  example="Bucuresti, Bd. Iuliu Maniu, Nr. 54",
     *              ),
     *              @OA\Property(
     *                  property="codPostal",
     *                  type="integer",
     *                  description="",
     *                  example=063423,
     *              ),
     *              @OA\Property(
     *                  property="email",
     *                  type="string",
     *                  description="",
     *                  example="bucuresti@first.ro",
     *              ),
     *              @OA\Property(
     *                  property="nrTelefon",
     *                  type="string",
     *                  description="",
     *                  example="+40244234340",
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
        $data = Locatie::where('idLocatie', '=', $request['idLocatie'])->firstOrFail();
        $this->locatieService->setProperties($data, $request->all());
        $data->save();
        return response()->json($data, Response::HTTP_OK);
    }

    /**
     * @OA\Post(
     *    path="/locatii",
     *    summary="Adauga locatia",
     *    tags={"Locatii"},
     *    description="Adauga locatia",
     *     @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(
     *              @OA\Property(
     *                  property="adresa",
     *                  type="string",
     *                  description="",
     *                  example="Bucuresti, Bd. Iuliu Maniu, Nr. 54",
     *              ),
     *              @OA\Property(
     *                  property="codPostal",
     *                  type="string",
     *                  description="",
     *                  example="063423",
     *              ),
     *              @OA\Property(
     *                  property="email",
     *                  type="string",
     *                  description="",
     *                  example="bucuresti@first.ro",
     *              ),
     *              @OA\Property(
     *                  property="nrTelefon",
     *                  type="string",
     *                  description="",
     *                  example="+40244234340",
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
        $data = new Locatie;
        $this->locatieService->setProperties($data, $request->all());
        $data->save();
        return response()->json($data, Response::HTTP_OK);
    }

    /**
     * @OA\Delete(
     *    path="/locatii/{id}",
     *    summary="Sterge locatia cu id-ul dat",
     *    tags={"Locatii"},
     *    description="Sterge locatia cu id-ul dat",
     *    @OA\Parameter(
     *        name="id",
     *        description="Id-ul locatiei dorite",
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
        $data = Locatie::where('idLocatie', '=', $id)->firstOrFail();
        $data->delete();
        return response()->json("DELETED", Response::HTTP_OK);
    }
}
