<?php

namespace App\Http\Controllers\Api\v1;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Requests\SettingRequest;
use App\Repository\Setting\EloquentSettingRepository;

class SettingController extends Controller
{
    protected $eloquentSetting;

    public function __construct(EloquentSettingRepository $eloquentSetting) {
        $this->eloquentSetting = $eloquentSetting;
    }
    
    /**
     * @OA\Patch(
     *      path="/settings",
     *      operationId="updateSetting",
     *      tags={"Settings"},
     *      summary="Update Setting",
     *      description="Update the specified setting in storage",
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 type="object",
     *                 @OA\Property(
     *                     property="key",
     *                     example="overtime_method",
     *                     type="string"
     *                 ),
     *                 @OA\Property(
     *                     property="value",
     *                     example="1",
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
     *                  property="meta",
     *              ),
     *              @OA\Property(
     *                  type="object",
     *                  property="data",
     *                  example=null
     *              )
     *          )
     *       )
     *     )
     */
    public function update(SettingRequest $request)
    {
        $setting = $this->eloquentSetting->updateSetting($request);

        return ResponseFormatter::success(
            null,
            'Success update settings'
        );
    }
}
