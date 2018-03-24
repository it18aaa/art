<?php

use Illuminate\Database\Seeder;
use App\Artwork;
use App\Tag;

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
            $artwork = factory(Artwork::class);

            $tag = Tag::where('name', 'painting')->first();

            $artwork->tags->attach($tag);
            $artwork->create();    
        }
    }
}
