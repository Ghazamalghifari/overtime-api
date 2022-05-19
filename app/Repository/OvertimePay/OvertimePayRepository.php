<?php

namespace App\Repository\OvertimePay;

use App\Http\Requests\OvertimePayRequest;

interface OvertimePayRepository
{
    public function calculate(OvertimePayRequest $request);
}