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
        

        $artworks = factory(Artwork::class, 40)->create();

        $faker = Faker\Factory::create();
        $tags = array("painting", "drawing", "sculpture", "crayon", "photograph", "computer generated");        

        foreach($artworks as $artwork ) {
            $artwork->tag( $faker->randomElement( $tags) );
        }
    }
}
