<?php

namespace Database\Seeders;

use App\Models\Step;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StepSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $mainStepOne = [
            'title'=>'اطلاعات اولیه',
            'description'=>'form step one sub step one in park registration',
            'order'=>1,
            ];


        $subSteps = [
            ['title'=>'شرکت',
            'description'=>'form step one  sub step two   in park registration',
            'order'=>1,
            'step_id'=>1,],

            ['title'=>'مدیرعامل',
            'description'=>'form step one  sub step two  in park registration',
            'order'=>2,
            'step_id'=>1,],

            ['title'=>'هیئت مدیره',
                'description'=>'form step one  sub step three  in park registration',
                'order'=>3,
                'step_id'=>1,],

            ['title'=>'سهامداری',
                'description'=>'form step one  sub step four in park registration',
                'order'=>4,
                'step_id'=>1,]
        ];



            $stepOne = Step::factory()->create($mainStepOne);
            foreach ($subSteps as $subStep) {
                $stepOne->step()->create($subStep);
            }


    }
}
