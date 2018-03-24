<?php

use Illuminate\Database\Seeder;
use App\Artist;

class ArtistTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $artist = factory(Artist::class, 20)->create();
    }
}
