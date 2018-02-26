<?php

namespace Tests\Browser;

use App\Artwork;
use App\Artist;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Faker\Factory as Faker;

class ViewListOfArtworkTest extends DuskTestCase
{
    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function testViewListOfArtwork()
    {
        /* create world
         *
         *  populate the database with artwork and then
         *  load the front page and check to see whether
         *  items on the list are visible
         *
         */
        $faker = Faker::create();

        for ($index = 0; $index < 40; $index++) {
            // create an artwork
            $art = factory(Artwork::class)->create();            
            $filename =  public_path('img/artwork/') . $art->id . ".jpg";            
            file_put_contents($filename, file_get_contents($faker->image));
        }
        //print_r($art);

        for($index = 0; $index < 30; $index++) {
            $artist = factory(Artist::class)->create();
            $filename = public_path('img/artist/') . $artist->id . ".jpg";
            file_put_contents($filename, file_get_contents($faker->image('\temp', 640,480, 'people')));
        }

        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->assertSee('art');
        });

        $this->browse(function (Browser $browser) {
            $browser->visit('/')->assertSee('things');

        });

        $this->browse(function (Browser $browser) {
            $browser->visit('/')->assertSee('stuff');
        });
    }
}
