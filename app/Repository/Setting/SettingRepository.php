<?php

namespace App\Repository\Setting;

use App\Http\Requests\SettingRequest;

interface SettingRepository
{
    public function updateSetting(SettingRequest $request);
}