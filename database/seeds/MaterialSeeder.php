<?php

use App\Material;
use Illuminate\Database\Seeder;

class MaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Material::create([
            'title' => '
            Substansi Hak dan Kewajiban Asasi Manusia dalam Perpektif Pancasila',
            'subject_id' => '24',
            'grade_major_id' => '8',
            'file' => 'pkn.pdf'
        ]);

        Material::create([
            'title' => 'Pendidikan Agama Islam',
            'subject_id' => '4',
            'grade_major_id' => '9',
            'file' => 'pab.pdf'
        ]);

        Material::create([
            'title' => 'Matematika',
            'subject_id' => '3',
            'grade_major_id' => '9',
            'file' => 'mtk.pdf'
        ]);
    }
}
