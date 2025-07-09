<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class ProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('programs')->insert([
            [
                'name' => 'Bachelor of Science in Computer Science',
                'description' => 'A 4-year undergraduate program focused on software, algorithms, and computing systems.',
                'created_by' => 1, // Adjust this ID based on existing user
                'updated_by' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Master of Business Administration',
                'description' => 'A 2-year program preparing professionals for leadership in business and management.',
                'created_by' => 1,
                'updated_by' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Diploma in Elementary Education',
                'description' => 'Designed for training primary school teachers.',
                'created_by' => 1,
                'updated_by' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
