<?php

namespace Tests\Unit;

use App\Artist;
use App\Artwork;
use Illuminate\Http\Request;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ArtistTest extends TestCase
{

    private $artist;
    private $artworks;
    private $requestGood;
    private $rtnArtist;

    public function setUp()
    {
        parent::setUp();


        // create world
        $this->artist = factory(Artist::class)->create();
        $this->artworks = factory(Artwork::class, random_int(3, 8))->create();

        foreach($this->artworks as $artwork)
        {
            $artwork->artist_id = $this->artist->id;
            $artwork->sold = (bool)random_int(0, 1);
            $artwork->save();
        }  

        $this->rtnArtist = new Artist();
        $this->requestGood = new Request();
        $this->requestGood->setMethod('POST');
        $this->requestGood->request->add([
            'title' => 'Mr',
            'firstname' => 'Steve',
            'lastname' => 'Huskinson',
            'bio' => 'Steve is an artist',
            'email' => 'steve@huskinson.com',
            'address1' => '54 Wenslydale Close',
            'address2' => 'Rather Common',
            'town' => 'Ormston',
            'county' => 'Mancashire',
            'postcode' => 'MA43 8YT',
            'telephone' => '0141 232 2222',
        ]);

        
    }

    public function tearDown()
    {
        

        foreach($this->artworks as $artwork)  {
            Artwork::destroy($artwork->id);
        }
        
        Artist::destroy($this->artist->id);  
        Artist::destroy($this->rtnArtist->id);      

        parent::tearDown();
    }

 
    public function testArtistReturnsArtworks()
    {
        // use the method, run asserts on return values
        $rtnArtworks = $this->artist->artworks;

        foreach($this->artworks as $artwork ) {
            $this->assertTrue($rtnArtworks->contains($artwork));
        }        
    }


    public function testCountArtworks() 
    {   
        // count artworks by artist from the artwork table.
        $number = Artwork::where('artist_id', $this->artist->id)->count();

        $this->assertEquals($number, $this->artist->countArtworks());
    }

    public function testCountSold()
    {
        $number = Artwork::where([
                    'artist_id' => $this->artist->id,
                    'sold' => true
                  ])->count();        

        $this->assertEquals($number, $this->artist->countSold());
    }

    public function testValidateAndSave()
    {
        $this->artist->validateAndSave($this->requestGood);
        $this->rtnArtist = Artist::where('email', 'steve@huskinson.com')->first();
        $this->assertEquals('Steve', $this->rtnArtist->firstname);
        $this->assertEquals('Huskinson', $this->rtnArtist->lastname);
    }

    public function testOrderAndListAll()
    {
            // this is a static helper function that returns
            // an array, indexed by artist id, of full names 

            $arr = Artist::orderAndListAll();

            foreach(Artist::get() as $artist)
            {
                $this->assertEquals($arr[$artist->id], $artist->firstname . " " . $artist->lastname);
            }


    }
    

    
}
