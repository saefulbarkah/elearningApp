<?php

use App\Day;
use Illuminate\Database\Seeder;

class DaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Day::create([
            'name' => 'Senin'
        ]);

        Day::create([
            'name' => 'Selasa'
        ]);

        Day::create([
            'name' => 'Rabu'
        ]);

        Day::create([
            'name' => 'Kamis'
        ]);

        Day::create([
            'name' => 'Jumat'
        ]);

        Day::create([
            'name' => 'Sabtu'
        ]);

        Day::create([
            'name' => 'Minggu'
        ]);
    }
}
