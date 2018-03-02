<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\CreateTestWorld;
use App\Artwork;
use App\Artist;

class ArtistTest extends TestCase
{
    use DatabaseMigrations;


    public function setUp() {
        parent::setUp();
       
        CreateTestWorld::create();

        
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testArtistArtworks()    
    {
       // pick some artists
       $artists = Artist::get();

       dd($artists);

       $this->assertTrue(false);
    }



    public function tearDown() {
        CreateTestWorld::destroy();
        parent::tearDown();
    }

    

}
