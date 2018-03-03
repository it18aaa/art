<?php

namespace Tests\Unit;

use App\Artist;
use App\Artwork;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ArtistTest extends TestCase
{
    //use DatabaseTransactions;
    use DatabaseMigrations;

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
    public function testArtistReturnsArtworks()
    {
        // create the world ...
        // create an artist
        $artist = new Artist;
        $artist->name = "Biff Johnson";
        $artist->save();

        // create two artworks
        $artwork1 = new Artwork;
        $artwork1->name = "Jupiter";
        $artwork1->artist_id = $artist->id;
        $artwork1->price = 999;
        $artwork1->pricepublic = true;
        $artwork1->onsale = true;
        $artwork1->save();

        $artwork2 = new Artwork;
        $artwork2->name = "Saturn";
        $artwork2->artist_id = $artist->id;
        $artwork2->price = 444;
        $artwork2->pricepublic = true;
        $artwork2->onsale = true;
        $artwork2->save();

        // use the method
        $rtnArtworks = $artist->artworks;

        // test the returned collection contains the artworks above
        $this->assertTrue($rtnArtworks->contains($artwork1));
        $this->assertTrue($rtnArtworks->contains($artwork2));

        // extract a piece of artwork
        $testpiece = $rtnArtworks[0];

        // the names should match
        $this->assertTrue($artwork1->name == $testpiece->name);
    }

}
