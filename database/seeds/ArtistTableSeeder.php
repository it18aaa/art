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
        //

          // create some artists
          for($index = 0; $index < 20; $index++) 
          {
              $artist = factory(Artist::class)->create();
          }
    }
}
