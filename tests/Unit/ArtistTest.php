<?php

namespace Tests\Unit;

use App\Artist;
use App\Artwork;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class ArtistTest extends TestCase
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
    public function testArtistArtworks()
    {
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

        $stuff = $artist->artworks;

        $testpiece = $stuff[0];
        $this->assertTrue($stuff->contains($artwork1));
        $this->assertTrue($stuff->contains($artwork2));
        $this->assertTrue($artwork1->name == $testpiece->name);
    }

}
