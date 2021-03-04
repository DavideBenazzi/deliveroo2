<?php

use Illuminate\Database\Seeder;
use App\Type;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [

            'Ristorante',
            'Pasticceria',
            'Lounge Bar',
            'Giapponese',
            'Pizzeria',
            'Burgeria',
            'Cinese',
            'Vegetariana',

            // 'Americana',
            // 'Cinese',
            // 'Pasticceria',
            // 'Giapponese',
            // 'Greca',
            // 'Indiana',
            // 'Italiana',
            // 'Messicana',
            // 'Pizzeria',
            // 'Sushi',
            // 'Thailandese',
            // 'Vegetariana',
            // 'Lounge Bar',
        ];
        foreach($types as $type) {
            $newType = new Type();
            $newType->name = $type;
            $newType->save();
        }
    }
}
