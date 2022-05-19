<?php

namespace App\Repository\OvertimePay;

use App\Http\Requests\OvertimePayRequest;
use App\Models\Employee;
use App\Models\Overtime;
use App\Models\Setting;
use Illuminate\Support\Facades\DB;

class EloquentOvertimePayRepository implements OvertimePayRepository
{

    public function calculate(OvertimePayRequest $request) {
        $dates = explode("-", $request->month);
        $year = $dates[0];
        $month = $dates[1];

        $setting = Setting::with('Reference:id,code,name,expression')
            ->select(
                'key',
                'value'
            )
            ->first();

        $employees = Employee::with(['Overtimes' => function($query) use ($year, $month) {
            return $query->select(
                'id',
                'employee_id',
                'date',
                'time_started',
                'time_ended'
            )->whereYear('date', $year)->whereMonth('date', $month);
        }])
        ->select('id','name','salary')
        ->get();

        $ttt = null;

        foreach ($employees as $i => $x) {
            $durationTotal = 0;

            foreach ($x->overtimes as $j => $y) {
                $x->overtimes[$j]->overtime_duration = round((strtotime($y->time_ended) - strtotime($y->time_started))/3600, 1);
                $employees[$i]->overtimes[$j] = $x->overtimes[$j];

                $durationTotal += $x->overtimes[$j]->overtime_duration;
            }

            $employees[$i]->overtime_duration_total = $durationTotal;
            $employees[$i]->amount = 0;


            if ($setting->reference->name == "Salary / 173") {

                $formula = $setting->reference->expression;
                $newFormula = str_replace(
                    ['Salary', 'overtime_duration_total'],
                    [$x->salary, $employees[$i]->overtime_duration_total],
                    $formula
                );

                eval( '$employees[$i]->amount = (' . $newFormula. ');' );
                $employees[$i]->amount = round($employees[$i]->amount, 2);

            } else {
                // Fixed
                $formula = $setting->reference->expression;
                $newFormula = str_replace(
                    ['overtime_duration_total'],
                    [$employees[$i]->overtime_duration_total],
                    $formula
                );

                eval( '$employees[$i]->amount = (' . $newFormula. ');' );
                $employees[$i]->amount = round($employees[$i]->amount, 2);
            }
        }

        return $employees;
    }

}