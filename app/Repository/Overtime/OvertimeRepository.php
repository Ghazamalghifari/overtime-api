<?php

namespace App\Repository\Overtime;

use App\Http\Requests\OvertimeRequest;

interface OvertimeRepository
{
    public function createOvertime(OvertimeRequest $request);
}