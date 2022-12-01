<?php

namespace Database\Seeders;

use App\Models\AssessmentRequirement;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AssessmentRequirementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AssessmentRequirement::factory()->times(10)->create();
    }
}
