<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        if(count(User::all()) > 0){
            return;
        }

        $cover_storage_path = storage_path('app/public/users');
        File::isDirectory($cover_storage_path) or File::makeDirectory($cover_storage_path, 0777, true, true);

        $faker = \Faker\Factory::create();

        for($i=0; $i<200; $i++){
            $user = new User();
            $user->name = $faker->name();
            $user->email = $faker->email;
            $user->phone = $faker->phoneNumber;
            $user->country = $faker->country;
            $user->address = $faker->address;
            $user->user_type = $faker->randomElement(['pilot', 'passenger']);
            $user->city = $faker->city;
            $user->photo = $faker->file(public_path('samples/users' ), $cover_storage_path, false);
            $user->password = Hash::make("password");
            $user->save();
        }
    }
}