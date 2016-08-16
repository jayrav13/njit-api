<?php

use Illuminate\Database\Seeder;

use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        User::create([
            "name" => "Jay Ravaliya",
            "email" => "jayrav13@gmail.com",
            "password" => "BqyTm7ZPpK3DnDFJhUPYBAQUph3RJJja"
        ]);

    }
}
