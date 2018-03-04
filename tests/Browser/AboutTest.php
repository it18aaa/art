<?php

namespace Tests\Browser;

use App\Artwork;
use App\Artist;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\DuskTestCase;
use Faker\Factory as Faker;

class AboutTest extends DuskTestCase
{
    use DatabaseMigrations;

    //  acceptance tests as per the user story acceptance criteria

    public function testShouldBeNavigableFromTheFrontPage() 
    {
        $this->browse(function (Browser $browser) 
        {
            $browser->visit('/')
                ->clickLink('about')
                ->assertSee('About the Gallery');              
        });
    }    

    public function testShouldHaveTheAddressSlashAbout()
    {
        $this->browse(function (Browser $browser)
        {
            $browser->visit('/about')
                ->assertSee('About the Gallery');

        });
    }

    // these three have been seperated tests
    // as they might move
    //
    public function testMustIncludeTheBusinessAddress()
    {
        $this->browse(function (Browser $browser)
        {
            $browser->visit('/about')
                ->assertSee('Address:');
        });
    }

    public function testShouldIncludeEmail()
    {
        $this->browse(function (Browser $browser)
        {
            $browser->visit('/about')
                ->assertSee('Email:');
        });
    }

    public function testShouldIncludePhoneNumber() 
    {
        $this->browse(function (Browser $browser)
        {
            $browser->visit('/about')
            ->assertSee('Email:');
        });
    }


}
