<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Reader;
use Faker\Factory as Faker;
class ReaderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        foreach(range(1,10) as $index){
            Reader::create([
                'name' => $faker->name(),
                'birthday' => $faker->dateTimeBetween('y-m-d'),
                'phone' => $faker->phoneNumber(),
                'address' => $faker->address(),
            ]);
        }
    }
}
