<?php

namespace Database\Seeders;

use App\Models\setting;
use Illuminate\Database\Seeder;

class settingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        setting::create([

            "name_en"=>"ecommerce",
            "name_ar"=>"ecommerce",
            "email"=>"ali@gmail.com",
            "facebook"=>"https://facebook.com",
            "facebook"=>null,
            "time_work"=>"ssdsd",
            "address"=>"syria",
            "phone"=>"23494293",
            "description"=>"this it good",
            "keywords"=>"good",
            "status"=>"open",
            "message"=>"not available",




        ]);

    }
}
