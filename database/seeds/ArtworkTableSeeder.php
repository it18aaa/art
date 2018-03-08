<?php

use Illuminate\Database\Seeder;
use App\Artwork;

class ArtworkTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // create some artwork
        for ($index = 0; $index < 40; $index++) 
        {            
            factory(Artwork::class)->create();    
        }
    }
}
