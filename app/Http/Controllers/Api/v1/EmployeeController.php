<?php

namespace App\Http\Controllers\Api\v1;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeRequest;
use App\Repository\Employee\EloquentEmployeeRepository;

class EmployeeController extends Controller
{
    protected $eloquentEmployee;

    public function __construct(EloquentEmployeeRepository $eloquentEmployee) {
        $this->eloquentEmployee = $eloquentEmployee;
    }
    
    /**
     * @OA\Post(
     *      path="/employees",
     *      operationId="createEmployee",
     *      tags={"Employees"},
     *      summary="Create Employee",
     *      description="Create the specified employee in storage",
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 type="object",
     *                 @OA\Property(
     *                     property="name",
     *                     example="ghazamalghifari",
     *                     type="string"
     *                 ),
     *                 @OA\Property(
     *                     property="salary",
     *                     example="2000000",
     *                     type="int"
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
    public function create(EmployeeRequest $request)
    {
        $employee = $this->eloquentEmployee->createEmployee($request);

        return ResponseFormatter::success(
            $employee,
            'Success create employees'
        );
    }
}
