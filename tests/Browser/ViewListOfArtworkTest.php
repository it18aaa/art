<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ExampleTest extends DuskTestCase
{
    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function ViewListOfArtworkTest()
    {
        /* create world 
        *
        *  populate the database with known artwork
        *  load the front page and check to see whether
        *  items on the list are visible
        *
        */

        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSee('@Rt');
        });

        $this->browse(function (Browser $browser) {
            $browser->visit('/')->assertSee('things');

        });

        $this->browse(function (Browser $browser) {
            $browser->visit('/')->assertSee('stuff');

        });
    }
}
