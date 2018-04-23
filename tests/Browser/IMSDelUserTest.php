<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use App\User;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class IMSDelUserTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testDelUser()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSee('Von Sprinkles');

            // create a unique user
            do {
                $userTest = factory(User::class)->make();                
            } while( User::where('email', $userTest->email )->count() > 0);

            $userTest->save();

            $this->assertDatabaseHas('users', [
                'email' => $userTest->email,
            ]);

            $this->assertDatabaseHas('users', [
                'id' => $userTest->id,
            ]);

            // find how many records are in the database ahead of it,
            // and calculate which page the result should be on               

            $position = User::find($userTest->id)->count();
            $page = floor(($position - 1) /10) +1;
            

            $browser
                ->loginAs(User::find(3))
                ->visit(route('ims.users.index') . '?page=' . $page)
                ->assertSee($userTest->name)
                ->assertSee($userTest->email);                            
            
            // test confirmation dialoge
            // test it can cancel
            $browser
                ->click('#delete-'.  $userTest->id)                            
                ->assertSee('Delete User?')                
                ->press('Cancel')                
                ->assertSee($userTest->name)
                ->assertSee($userTest->email);

            // test OK Press
            $browser
                ->click('#delete-'.  $userTest->id)                            
                ->assertSee('Delete User?')                
                ->press('OK')                
                ->assertDontSee($userTest->name)
                ->assertDontSee($userTest->email);

            // ensure record has been deleted from the database
            $this->assertDatabaseMissing('users', [
                'email' => $userTest->email,
            ]);

            $this->assertDatabaseMissing('users', [
                'id' => $userTest->id,
            ]);


        });



    }
}
