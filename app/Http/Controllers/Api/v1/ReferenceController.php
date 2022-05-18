<?php

namespace App\Http\Controllers\Api\v1;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Reference;
use Illuminate\Http\Request;


class ReferenceController extends Controller
{
    /**
     * @OA\Get(
     *      path="/references",
     *      operationId="getReferencesList",
     *      tags={"References"},
     *      summary="Get list of references",
     *      description="Returns list of references",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(
     *              type="object",
     *              @OA\Property(
     *                  type="object",
     *                  property="meta",
     *              ),
     *              @OA\Property(
     *                  type="array",
     *                  property="data",
     *                  @OA\Items(
     *                      @OA\Property(
     *                         property="id",
     *                         type="int",
     *                         example="1"
     *                      ),
     *                      @OA\Property(
     *                         property="code",
     *                         type="string",
     *                         example="overtime_method"
     *                      ),
     *                      @OA\Property(
     *                         property="name",
     *                         type="string",
     *                         example="Fixed"
     *                      ),
     *                      @OA\Property(
     *                         property="expression",
     *                         type="number",
     *                         example="10000 * overtime_duration_total"
     *                      ),
     *                      @OA\Property(
     *                         property="created_at",
     *                         type="string",
     *                         example="2022-05-18T08:13:31.000000Z"
     *                      ),
     *                      @OA\Property(
     *                         property="updated_at",
     *                         type="string",
     *                         example="2022-05-18T08:13:31.000000Z"
     *                      ),
     *                ),
     *              )
     *          )
     *       )
     *     )
     */
    public function index()
    {
        $data = Reference::all();

        return ResponseFormatter::success(
            $data,
            'Success get list references'
        );
    }
}
