<?php

namespace Tests\Unit;

use App\Artist;
use App\Artwork;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class ArtworkTest extends TestCase
{
    use DatabaseTransactions;

    private $world;
    public function setUp()
    {
        parent::setUp();
    }

    public function tearDown()
    {
        parent::tearDown();
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testArtworkReturnsArtist()
    {
        // create world...
        // create an artist
        $artist = new Artist;
        $artist->name = "Bingo Jefferson";
        $artist->save();

        // create two artworks
        $artwork1 = new Artwork;
        $artwork1->name = "Moon";
        $artwork1->artist_id = $artist->id;
        $artwork1->price = 999;
        $artwork1->pricepublic = true;
        $artwork1->onsale = true;
        $artwork1->save();

        $artwork2 = new Artwork;
        $artwork2->name = "Pluto";
        $artwork2->artist_id = $artist->id;
        $artwork2->price = 444;
        $artwork2->pricepublic = true;
        $artwork2->onsale = true;
        $artwork2->save();

        // run the method

        $rtnArtist1 = $artwork1->artist;
        $rtnArtist2 = $artwork2->artist;

        //returned  artists the same as originally set up?

        $this->assertTrue($rtnArtist1->name == $artist->name);
        $this->assertTrue($rtnArtist2->name == $artist->name);

    }

}
