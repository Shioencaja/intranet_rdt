<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->email = "admin@gmail.com";
        $user->name='admin';
        $user->password = Hash::make("admin@09A");
        $user->role = 2;
        $user->save();



        $lines = [
            ["line" => "FILLER COLOR","image_url"=>env('APP_URL').'/images/tutorials/image.png'],
            ["line" => "PRO LUMINOUS","image_url"=>env('APP_URL').'/images/tutorials/image.png'],
            ["line" => "PRO NUTRITIVE","image_url"=>env('APP_URL').'/images/tutorials/image.png'],
            ["line" => "PRO REPAIR","image_url"=>env('APP_URL').'/images/tutorials/image.png'],
            ["line" => "PRO FILLER","image_url"=>env('APP_URL').'/images/tutorials/image.png'],
            ["line" => "POST LISS","image_url"=>env('APP_URL').'/images/tutorials/image.png'],
            ["line" => "PRO BALANCE","image_url"=>env('APP_URL').'/images/tutorials/image.png'],
            ["line" => "PRO CLEAN & SOFT","image_url"=>env('APP_URL').'/images/tutorials/image.png'],
            ["line" => "FINISHING & FIXING","image_url"=>env('APP_URL').'/images/tutorials/image.png'],
            ["line" => "SALON TREATMENT","image_url"=>env('APP_URL').'/images/tutorials/image.png'],
            ["line" => "PRO HYALURONIC ACID","image_url"=>env('APP_URL').'/images/tutorials/image.png'],
        ];
        \DB::table("lines")->insert($lines);
    }
}
