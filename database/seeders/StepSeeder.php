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
            'title'=>'step_one',
            'description'=>'form step one  in park registration',
            'order'=>1,
            ];
        $mainStepTwo= [
            'title'=>'step_two',
            'description'=>'form step two in park registration',
            'order'=>2,
        ];
        $mainStepThree = [
            'title'=>'step_three',
            'description'=>'form step three in park registration',
            'order'=>3,
        ];


        $subSteps = [
            ['title'=>'step_one',
            'description'=>'form step one  sub step two   in park registration',
            'order'=>1,
            'step_id'=>1,],

            ['title'=>'step_two',
            'description'=>'form step one  sub step two  in park registration',
            'order'=>2,
            'step_id'=>1,],

            ['title'=>'step_three',
                'description'=>'form step one  sub step three  in park registration',
                'order'=>3,
                'step_id'=>1,],

            ['title'=>'step_four',
                'description'=>'form step one  sub step four in park registration',
                'order'=>4,
                'step_id'=>1,]
        ];



            $stepOne = Step::factory()->create($mainStepOne);
             Step::factory()->create($mainStepTwo);
             Step::factory()->create($mainStepThree);
            foreach ($subSteps as $subStep) {
                $stepOne->step()->create($subStep);
            }


    }
}
