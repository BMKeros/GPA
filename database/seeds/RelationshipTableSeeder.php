<?php

use Illuminate\Database\Seeder;

use App\Relationship;

class RelationshipTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Relationship::insert([
            [
                'id' => 1,
                'name' => 'FAMILIAR'
            ],
            [
                'id' => 2,
                'name' => 'AMIGO'
            ],
            [
                'id' => 3,
                'name' => 'VECINO'
            ]
        ]);
    }
}
