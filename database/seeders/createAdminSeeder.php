<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class createAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Admin::create([

            "name_en"=>"Ali Hmaidi",
            "name_ar"=>"علي حاج حميدي",
            "is_controller"=>1,
            "email"=>"alihmaidi095@gmail.com",
            "password"=>Hash::make("ali450892")

        ]);


    }
}
