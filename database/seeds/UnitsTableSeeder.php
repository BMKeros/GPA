<?php

use Illuminate\Database\Seeder;
use App\Units;

class UnitsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fields = [
            ["name" => 'Metro', "abbreviation" => 'm'],
            ["name" => 'Pulgada', "abbreviation" => 'plg'],
            ["name" => 'Pie', "abbreviation" => 'ft'],
            ["name" => 'Micro', "abbreviation" => 'µ'],
            ["name" => 'Decimetro', "abbreviation" => 'dc'],
            ["name" => 'Centimetro', "abbreviation" => 'cm'],
            ["name" => 'Milimetro', "abbreviation" => 'mm'],
            ["name" => 'Micrometro', "abbreviation" => 'µm'],
            ["name" => 'Manometro', "abbreviation" => 'nm'],
            ["name" => 'Picometro', "abbreviation" => 'pm'],
            ["name" => 'Libra', "abbreviation" => 'lb'],
            ["name" => 'Onza', "abbreviation" => 'oz'],
            ["name" => 'Decigramo', "abbreviation" => 'dg'],
            ["name" => 'Centigrados', "abbreviation" => 'cg'],
            ["name" => 'gramos', "abbreviation" => 'gr'],
            ["name" => 'Miligramos', "abbreviation" => 'mg'],
            ["name" => 'Microgramos', "abbreviation" => 'µg'],
            ["name" => 'Manogramos', "abbreviation" => 'ng'],
            ["name" => 'Picogramos', "abbreviation" => 'pg'],
            ["name" => 'Decagramos', "abbreviation" => 'deg'],
            ["name" => 'Hectogramos', "abbreviation" => 'Hg'],
            ["name" => 'Kilogramos', "abbreviation" => 'Kg'],
            ["name" => 'Miriagramos', "abbreviation" => 'Mig'],
            ["name" => 'Galon', "abbreviation" => 'gal'],
            ["name" => 'Tonelada metrica', "abbreviation" => 't'],
            ["name" => 'Cajas', "abbreviation" => 'caj'],
            ["name" => 'Unidad', "abbreviation" => 'unid'],
            ["name" => 'Sacos', "abbreviation" => 'sac']
        ];

        Units::insert($fields);
    }
}
