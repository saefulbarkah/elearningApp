<?php

use App\Subject;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Subject::create([
            'name' => 'Bahasa Indonesia'
        ]);

        Subject::create([
            'name' => 'Bahasa Inggris'
        ]);

        Subject::create([
            'name' => 'Matematika'
        ]);

        Subject::create([
            'name' => 'Pendidikan Agama Islam'
        ]);

        Subject::create([
            'name' => 'Sejarah Indonesia'
        ]);

        Subject::create([
            'name' => 'Seni Budaya'
        ]);

        Subject::create([
            'name' => 'PJOK'
        ]);

        Subject::create([
            'name' => 'SIMDIG'
        ]);

        Subject::create([
            'name' => 'Fisika'
        ]);

        Subject::create([
            'name' => 'Kimia'
        ]);

        Subject::create([
            'name' => 'Sistem Komputer'
        ]);

        Subject::create([
            'name' => 'KOMJAR'
        ]);

        Subject::create([
            'name' => 'Pemrograman Dasar'
        ]);

        Subject::create([
            'name' => 'Dasar Desain Grafis'
        ]);

        Subject::create([
            'name' => 'Desain Grafis Percetakan'
        ]);

        Subject::create([
            'name' => 'Desain Media Interaktif'
        ]);

        Subject::create([
            'name' => 'Animasi 2D dan 3D'
        ]);

        Subject::create([
            'name' => 'Teknik Pengolahan Audio dan Video'
        ]);

        Subject::create([
            'name' => 'Permodelan Perangkat Lunak'
        ]);

        Subject::create([
            'name' => 'Basis Data'
        ]);

        Subject::create([
            'name' => 'PBO'
        ]);

        Subject::create([
            'name' => 'PWPB'
        ]);

        Subject::create([
            'name' => 'Produk Kreatif dan KWU'
        ]);

        Subject::create([
            'name' => 'PKN'
        ]);

        Subject::create([
            'name' => 'B.Jepang'
        ]);

    }
}
