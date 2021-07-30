<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HardwareSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->faker = \Faker\Factory::create('ms_MY');
        DB::table('hardware')->insert([
            [
                'id' => 1,
                // 'uuid' => $this->faker->uuid,
                'name' => 'Laptop',
                'description' => 'Beli untuk staff',
                'price' => 1000
            ],
            [
                'id' => 2,
                // 'uuid' => $this->faker->uuid,
                'name' => 'Desktop',
                'description' => 'Beli untuk staff',
                'price' => 1000
            ],
            [
                'id' => 3,
                // 'uuid' => $this->faker->uuid,
                'name' => 'Drone',
                'description' => 'Beli untuk staff',
                'price' => 1000
            ],
        ]);
    }
}
