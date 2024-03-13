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
            $mainStepOne = ['step_number'=>'one'];
            $mainStepTwo = ['step_number'=>'two'];
            $mainStepThree = ['step_number'=>'three'];

            $subStepsOne = [
                ['step_number'=>'one'],
                ['step_number'=>'two'],
                ['step_number'=>'three'],
                ['step_number'=>'four'],
                ];

            $stepOne = Step::factory()->create($mainStepOne);
            foreach ($subStepsOne as $subStepOne) {
                $stepOne->step()->create($subStepOne);
            }


    }
}
