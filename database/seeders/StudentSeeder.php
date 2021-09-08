<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;
class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        DB::table('students')->insert([
            'name'   =>  $faker->name(),
            'lname'  =>  $faker->name(),
            'email'  =>  $faker->unique()->safeEmail(),
            'mobile' =>  $faker->numerify('##########')
        ]);
    }
}
