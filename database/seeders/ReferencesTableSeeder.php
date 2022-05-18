<?php

namespace Database\Seeders;

use App\Models\Reference;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReferencesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Reference::create([
        	'code' => 'overtime_method',  
        	'name' => 'Salary / 173', 
        	'expression' => '(Salary / 173) * overtime_duration_total',  
        ]);

        Reference::create([
        	'code' => 'overtime_method',  
        	'name' => 'Fixed', 
        	'expression' => '10000 * overtime_duration_total',  
        ]);
    }
}
