<?php

use App\Announcement;
use Illuminate\Database\Seeder;

class AnnouncementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Announcement::create([
            'title' => 'ulangan tanggal 20',
            'description' => 'ulangan tengah semester untuk seluruh kelas',
            'start_time' => '09:00',
            'end_time' => '10:00'
        ]);

        Announcement::create([
            'title' => 'Pembagian hasil ulangan',
            'description' => 'hasil ulangan akan dibagikan pada tanggal 25',
            'start_time' => '10:00',
            'end_time' => '11:00'
        ]);

        Announcement::create([
            'title' => 'libur setelah ulangan',
            'description' => 'libur dari tanggal 26 mei s/d 2 juni',
            'start_time' => '11:00',
            'end_time' => '12:00'
        ]);
    }
}
