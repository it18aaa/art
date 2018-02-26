<?php

namespace Tests\Browser;

use App\Artwork;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

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
         *  populate the database with known artwork and then
         *  load the front page and check to see whether
         *  items on the list are visible
         *
         */

        for ($index = 0; $index < 20; $index++) {
            $art = factory(Artwork::class)->create();
        }
        //print_r($art);

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
