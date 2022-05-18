<?php

namespace App\Http\Controllers\Api\v1;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Requests\OvertimeRequest;
use App\Repository\Overtime\EloquentOvertimeRepository;
use Illuminate\Http\Request;

class OvertimeController extends Controller
{
    //
    protected $eloquentOvertime;

    public function __construct(EloquentOvertimeRepository $eloquentOvertime) {
        $this->eloquentOvertime = $eloquentOvertime;
    }

    /**
     * @OA\Post(
     *      path="/overtimes",
     *      operationId="createOvertime",
     *      tags={"Overtimes"},
     *      summary="Create Overtime",
     *      description="Create the specified overtime in storage",
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 type="object",
     *                 @OA\Property(
     *                     property="employee_id",
     *                     example="1",
     *                     type="integer"
     *                 ),
     *                 @OA\Property(
     *                     property="date",
     *                     example="2022-05-05",
     *                     type="string"
     *                 ),
     *                 @OA\Property(
     *                     property="time_started",
     *                     example="15:00",
     *                     type="string"
     *                 ),
     *                 @OA\Property(
     *                     property="time_ended",
     *                     example="17:00",
     *                     type="string"
     *                 )
     *             )
     *          )
     *     ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(
     *              type="object",
     *              @OA\Property(
     *                  type="object",
     *                  property="meta"
     *              ),
     *              @OA\Property(
     *                  type="object",
     *                  property="data" 
     *              )
     *          )
     *       )
     *     )
     */

    public function create(OvertimeRequest $request)
    {
        $overtime = $this->eloquentOvertime->createOvertime($request);
        if (gettype($overtime) == "string") {
            return ResponseFormatter::error(
                null,
                $overtime,
                409
            );
        }
        return ResponseFormatter::success(
            $overtime,
            'Success create overtimes'
        );
    }
}
