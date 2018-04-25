<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use App\User;
use App\Artwork;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class CMSArtworksTest extends DuskTestCase
{
    
    public function testCMSIndex()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSee('Von Sprinkles');

            $browser
                ->loginAs(User::find(3))
                ->visit(route('cms.index'))
                ->assertSee('Content Management');                
        });
    }

    public function testCMSArtworksIndex()
    {
        $this->browse(function (Browser $browser) {
            $browser
                ->loginAs(User::find(3))
                ->visit(route('cms.artworks.index'))
                ->assertSee('Artworks');

            foreach(Artwork::orderBy('name')->limit(5)->get() as $artwork)
            {
                $browser->assertSee($artwork->name);
            }
        });
    }

    public function testCMSArtworksIndexViewEditButton()
    {
        $this->browse(function (Browser $browser) {
            $browser
                ->loginAs(User::find(3))
                ->visit(route('cms.artworks.index'));

            $artwork = Artwork::orderBy('name')->first();

            $browser
                ->click('#view-'.$artwork->id);

            $browser
                ->assertSee($artwork->name)
                ->assertSee($artwork->artist->firstname)
                ->assertSee($artwork->artist->lastname);                
        });
    }

    public function testCMSArtworksTags()
    {
        $this->artwork = factory(Artwork::class)->create();

        $this->browse(function(Browser $browser) {
            $browser
                ->loginAs(User::find(3))
                ->visit(route('cms.artworks.edit', $this->artwork->id))
                ->type('#newtagtext', 'biffomatic')
                ->click('#addtag')
                ->assertSee('tag added')
                ->type('#newtagtext', 'wilburness')
                ->click('#addtag')
                ->assertSee('tag added')
                ->type('#newtagtext', 'womblehumperdink')
                ->click('#addtag')
                ->assertSee('tag added')
                ->assertSee('biffomatic')
                ->assertSee('wilburness')
                ->assertSee('womblehumperdink');

            


        });
    }
}