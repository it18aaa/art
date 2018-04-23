<?php

namespace Tests\Unit;

use App\Artist;
use App\Artwork;
use App\Customer;
use App\Sale;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ArtworkTest extends TestCase
{
    private $artwork;
    private $artist;
    private $customer;
    private $sale;

    public function testArtist()
    {

    }

 
    public function setUp()
    {
        $this->artwork = factory(Artwork::class)->create();
        $this->artist = factory(Artist::class)->create();
        $this->customer = factory(Customer::class)->create();

        $this->artwork->artist_id = $this->artist->id;
        $this->artwork->sale_id = $this->sale->id;
        $this->sale->customer_id = $this->customer->id;

        $this->sale = new Sale();
        parent::setUp();
    }

    public function tearDown()
    {
        parent::tearDown();
    }


}
