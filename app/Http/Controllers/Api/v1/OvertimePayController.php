<?php

namespace App\Http\Controllers\Api\v1;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Requests\OvertimePayRequest;
use App\Repository\OvertimePay\EloquentOvertimePayRepository;

class OvertimePayController extends Controller
{
    protected $eloquentOvertimePay;

    public function __construct(EloquentOvertimePayRepository $eloquentOvertimePay) {
        $this->eloquentOvertimePay = $eloquentOvertimePay;
    }

    /**
     * @OA\Get(
     *      path="/overtime-pays/calculate",
     *      operationId="getOvertimePaysCalculate",
     *      tags={"Overtime Pays"},
     *      summary="Get calculate of overtime pays",
     *      description="Returns list of overtime pays calculate",
     *      @OA\Parameter(
     *         name="month",
     *         in="query",
     *         required=true,
     *         example="2022-05"
     *      ),
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
     *                  type="object",
     *                  property="data",
     *              )
     *          )
     *       )
     *     )
     */
    public function calculate(OvertimePayRequest $request)
    {
        $data = $this->eloquentOvertimePay->calculate($request);

        return ResponseFormatter::success(
            $data,
            'Success get overtime pays calculate'
        );
    }
}
