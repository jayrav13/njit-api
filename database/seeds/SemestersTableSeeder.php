<?php

use Illuminate\Database\Seeder;

use App\Models\Semester;

class SemestersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Semester::create([
            "name" => "Spring",
            "permalink" => "spring",
        ]);

        Semester::create([
            "name" => "Summer",
            "permalink" => "summer"
        ]);
        Semester::create([
            "name" => "Fall",
            "permalink" => "fall"
        ]);
        Semester::create([
            "name" => "Winter",
            "permalink" => "winter"
        ]);

    }
}
