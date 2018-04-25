<?php

namespace Tests\Unit;

use App\Artist;
use App\Artwork;
use App\Customer;
use App\Sale;
use Illuminate\Http\Request;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ArtworkTest extends TestCase
{
    private $artwork;
    private $artist;
    private $sale;


    public function testArtist()
    {

        // perhaps the artist should return a single artist
        // rather than a collection?
        //
        $rtnArtist = $this->artwork->artist()->first();;

        $this->assertEquals($rtnArtist->firstname, $this->artist->firstname);
        $this->assertEquals($rtnArtist->lastname, $this->artist->lastname);
        $this->assertEquals($rtnArtist->id, $this->artist->id);
        
    }

    public function testSale()
    {
        $this->assertEquals($this->sale->id, $this->artwork->sale->id);        
    }

    public function testValidateAndSave() 
    {
        $testArtwork = factory(Artwork::class)->make();

        $requestGood = new Request();
        $requestGood->setMethod('POST');
        $requestGood->request->add([
            'name' => $testArtwork->name,
            'price' => $testArtwork->price,            
            'artist' => $this->artist->id,
            'sold' => $testArtwork->sold,
            'pricepublic' => $testArtwork->pricepublic,
            'description' => $testArtwork->description,
            'width' => 300,
            'height' => 300,
            'depth' => 10,
        ]);

        $this->artwork->validateAndSave($requestGood);

        $saved = Artwork::where('name', $testArtwork->name)->first();
        
        $this->assertEquals($testArtwork->name, $saved->name );
        $this->assertEquals($testArtwork->price, $saved->price);
        
        Artwork::destroy($saved->id);
    }

    public function testGetFeatured()
    {        
        $this->artwork->tag('featured');
        $this->artwork->save();
                 
        $this->assertTrue( Artwork::getFeatured()->contains($this->artwork) );

        $this->artwork->untag('featured');
        $this->artwork->save();

        $this->assertFalse( Artwork::getFeatured()->contains($this->artwork) );
    }
 
    public function setUp()
    {
        parent::setUp();


        $this->artwork = factory(Artwork::class)->create();
        $this->artist = factory(Artist::class)->create();
        $this->customer = factory(Customer::class)->create();
        $this->sale = new Sale();     
        $this->sale->save();

        $this->artwork->artist_id = $this->artist->id;
        $this->artwork->sale_id = $this->sale->id;
        $this->sale->customer_id = $this->customer->id;
        $this->artwork->save();
        $this->sale->save();
        
    }

    public function tearDown()
    {        
        Sale::destroy($this->sale->id);
        Customer::destroy($this->customer->id);
        Artwork::destroy($this->artwork->id);
        Artist::destroy($this->artist->id);

        parent::tearDown();
    }


}
