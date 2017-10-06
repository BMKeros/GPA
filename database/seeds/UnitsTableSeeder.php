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
            ["name" => 'Fahreheint', "abbreviation" => 'F'],
            ["name" => 'Kelvin', "abbreviation" => 'K'],
            ["name" => 'Celsius', "abbreviation" => 'C'],
            ["name" => 'Galon', "abbreviation" => 'gal'],
            ["name" => 'Pie cubico', "abbreviation" => 'pie3'],
            ["name" => 'Decimetros cubicos', "abbreviation" => 'dm3'],
            ["name" => 'Centimetros cubicos', "abbreviation" => 'cm3'],
            ["name" => 'Milimetros cubicos', "abbreviation" => 'mm3'],
            ["name" => 'Micrometros cubicos', "abbreviation" => 'µm3'],
            ["name" => 'Manometros cubicos', "abbreviation" => 'nm3'],
            ["name" => 'Picometros cubicos', "abbreviation" => 'pm3'],
            ["name" => 'Decametros cubicos', "abbreviation" => 'dem3'],
            ["name" => 'Hectometros cubicos', "abbreviation" => 'Hm3'],
            ["name" => 'Kilometros cubicos', "abbreviation" => 'km3'],
            ["name" => 'Miriametros cubicos', "abbreviation" => 'Min3'],
            ["name" => 'Decametros', "abbreviation" => 'dem'],
            ["name" => 'Hectometros', "abbreviation" => 'Hm'],
            ["name" => 'Kilometros', "abbreviation" => 'Km'],
            ["name" => 'Miriametros', "abbreviation" => 'Min'],
            ["name" => 'Tonelada metrica', "abbreviation" => 't'],
            ["name" => 'Cajas', "abbreviation" => 'caj'],
            ["name" => 'Unidad', "abbreviation" => 'unid'],
            ["name" => 'Sacos', "abbreviation" => 'sac']
        ];

        Units::insert($fields);
    }
}
