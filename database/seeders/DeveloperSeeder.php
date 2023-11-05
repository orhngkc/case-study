<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DeveloperSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $developers = [
            [
                'name' => 'DEV1',
                'hour' => 1,
                'difficulty_level' => 1,
            ],
            [
                'name' => 'DEV2',
                'hour' => 1,
                'difficulty_level' => 2,
            ],
            [
                'name' => 'DEV3',
                'hour' => 1,
                'difficulty_level' => 3,
            ],
            [
                'name' => 'DEV4',
                'hour' => 1,
                'difficulty_level' => 4,
            ],
            [
                'name' => 'DEV5',
                'hour' => 1,
                'difficulty_level' => 5,
            ],
        ];

        DB::table('developers')->insert($developers);
    }
}
