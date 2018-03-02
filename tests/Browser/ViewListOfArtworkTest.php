<?php

namespace Tests\Browser;

use App\Artwork;
use App\Artist;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\DuskTestCase;
use Faker\Factory as Faker;

class ViewListOfArtworkTest extends DuskTestCase
{
    use DatabaseMigrations;

    private $imgTestDir;
    private $imgDir;
    private $imgTemp;
    
    public function setUp() {
        parent::setUp();

        $faker = Faker::create();    
                
        $this->imgTestDir = base_path() . "/tests/data/img/";
        $this->imgDir = public_path() . "/img/";
        $this->imgTemp = base_path() . "/tests/data/backup/";
        
        
        // create some artwork
        for ($index = 0; $index < 40; $index++) 
        {            
            $tempart = factory(Artwork::class)->create();    
        }

        // create some artists
        for($index = 0; $index < 30; $index++) 
        {
            $artist = factory(Artist::class)->create();
        }

        // move the images around
        rename($this->imgDir . "artist",  $this->imgTemp . "artist");
        rename($this->imgTestDir . "artist", $this->imgDir . "artist");
        
        rename($this->imgDir . "artwork",  $this->imgTemp . "artwork");
        rename($this->imgTestDir . "artwork", $this->imgDir . "artwork");

    }
    
    
    public function tearDown()
    {
        parent::tearDown();

        // move the picture directories back from whence they came !

        rename($this->imgDir . "artist",  $this->imgTestDir . "artist");
        rename($this->imgTemp . "artist", $this->imgDir . "artist");
        
        rename($this->imgDir . "artwork",  $this->imgTestDir . "artwork");
        rename($this->imgTemp . "artwork", $this->imgDir . "artwork");

        

    }

    public function testCanWeSeeTheTitle() {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->assertSee('art')
                ->assertSee('things');
        });
    }
    
    public function testViewListOfArtwork()
    {             
        
        // test each piece of artwork is visible on the screen
        $this->browse(function (Browser $browser) {
            $artwork = Artwork::all();
            $browser->visit('/');
            foreach($artwork as $piece) {
                if($piece->onsale) {
                                        
                    $browser->assertSee($piece->name);
                    $browser->assertSee($piece->price);                                            
                }
            }
            
        });
        



    }




        

}
