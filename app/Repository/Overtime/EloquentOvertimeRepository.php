<?php

namespace App\Repository\Overtime;

use App\Models\Overtime;
use App\Http\Requests\OvertimeRequest;

class EloquentOvertimeRepository implements OvertimeRepository
{

    public function createOvertime(OvertimeRequest $request) {

        $check_overtime = Overtime::select('date')
        ->where('employee_id',$request->employee_id)
        ->where('date',$request->date)
        ->first();

        if (!$check_overtime) {
            $overtime = Overtime::create([
                'employee_id' => $request->employee_id,
                'date' => $request->date,
                'time_started' => $request->time_started,
                'time_ended' => $request->time_ended 
             ]);
             
             return $overtime;
        }

        return "Overtime ditanggal tersebut sudah ada.";
        
    }

}