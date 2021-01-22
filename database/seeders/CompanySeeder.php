<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Company;
use Illuminate\Support\Facades\File;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        if(count(Company::all()) > 0){
            return;
        }
        $cover_storage_path = storage_path('app/public/companies');
        File::isDirectory($cover_storage_path) or File::makeDirectory($cover_storage_path, 0777, true, true);

        $faker = \Faker\Factory::create();

        for($i=0; $i<10; $i++){
            $flight = new Company();
            $flight->name = $faker->text(20);
            $flight->number_of_aircrafts = random_int(5, 20);
            $flight->main_office = $faker->text(20);
            $flight->photo = $faker->file(public_path('samples/companies' ), $cover_storage_path, false);
            $flight->number_of_branches = random_int(2, 5);
            $flight->save();
        }
    }
}