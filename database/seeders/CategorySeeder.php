<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $categories = [
            ['category' => 'Sales and Marketing'],
            ['category' => 'Design and Creative'],
            ['category' => 'Customer Service'],
            ['category' => 'Nonprofit and Volunteer'],
            ['category' => 'Finance'],
            ['category' => 'Development and Programming'],
            ['category' => 'Human Resources'],
            ['category' => 'Transportation and Logistics'],
            ['category' => 'Education'],
            ['category' => 'Healthcare'],
            
           
        ];

        DB::table('user_category')->insert($categories);
    }
}
