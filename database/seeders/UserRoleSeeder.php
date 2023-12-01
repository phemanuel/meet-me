<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userRoles = [
            ['user_roles' => 'Blogger'],
            ['user_roles' => 'Influencer'],
            ['user_roles' => 'Model'],
            ['user_roles' => 'Researcher'],
            ['user_roles' => 'Photographer'],
            ['user_roles' => 'Content Creator'],
            ['user_roles' => 'Social Media Manager'],
            ['user_roles' => 'Videographer'],
            ['user_roles' => 'Illustrator'],
            ['user_roles' => 'Graphic Designer'],
            ['user_roles' => 'Story Telling'],
            ['user_roles' => 'Public Speaker'],
            ['user_roles' => 'Content Marketer'],
            ['user_roles' => 'Influencer Marketer'],
            ['user_roles' => 'Music Creator'],
            ['user_roles' => 'Business Owner'],
            ['user_roles' => 'Entrepreneur'],
            ['user_roles' => 'Community Manager'],
            ['user_roles' => 'Virtual Assistant'],
            ['user_roles' => 'Life Coach'],
            ['user_roles' => 'Brand Strategist'],
            ['user_roles' => 'Artist'],
            ['user_roles' => 'Youtuber'],
            ['user_roles' => 'Fashion Designer'],
            ['user_roles' => 'Data Analyst'],
            ['user_roles' => 'Data Scientist'],
            ['user_roles' => 'Product Manager'],
            ['user_roles' => 'Product Designer'],
            ['user_roles' => 'Digital Marketer'],
            ['user_roles' => 'Web Developer'],
            ['user_roles' => 'Software Developer'],
            ['user_roles' => 'Backend Developer'],
            ['user_roles' => 'Frontend Developer'],
            ['user_roles' => 'Lead Generator'],
        ];

        DB::table('user_roles')->insert($userRoles);
    }

}
