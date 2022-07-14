<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class ProductSeeder extends Seeder
{
    public function run()
    {
        for ($i = 0; $i < 10; $i++) { 
			//to add 10 products. Change limit as desired
            $this->db->table('products')->insert($this->generateProducts());
        }
    }

    private function generateProducts(): array
    {
        $faker = Factory::create();
        return [
            'name' => $faker->name,
			'description' => $faker->sentence(6),
			'amount' => $faker->numberBetween(50, 200),
			'status' => $faker->randomElement([1, 0])
        ];
    }
}