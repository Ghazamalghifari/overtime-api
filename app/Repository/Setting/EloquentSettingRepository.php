<?php

namespace App\Repository\Setting;

use App\Models\Setting;
use App\Http\Requests\SettingRequest;

class EloquentSettingRepository implements SettingRepository
{

    public function updateSetting(SettingRequest $request) {
        $setting = Setting::where('key', $request->key)
            ->update([
                'value' => $request->value,
            ]);

        return $setting;
    }

}