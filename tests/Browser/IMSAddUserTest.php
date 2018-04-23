<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use App\User;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class IMSAddUserTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testAddUser()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSee('Von Sprinkles');

            // create a unique user
            do {
                $userTest = factory(User::class)->make();                
            } while( User::where('email', $userTest->email )->count() > 0);

            $existingEmail = User::first()->email;
                                    
                // failing tests!

                // just username
                $browser->loginAs(User::find(3))
                    ->visit(route('ims.users.create'))
                    ->type('name', $userTest->name)
                    ->press('Submit')                    
                    ->assertSee('The email field is required')
                    ->assertSee('The password field is required');

                // just email
                $browser
                    ->visit(route('ims.users.create'))
                    ->type('email', $userTest->email)
                    ->press('Submit')
                    ->assertSee('The name field is required')
                    ->assertSee('The password field is required');

                // just matchign passwords
                $browser 
                    ->visit(route('ims.users.create'))
                    ->type('password', 'secret')
                    ->type('password_confirmation', 'secret')
                    ->press('Submit')
                    ->assertSee('The email field is required')
                    ->assertSee('The name field is required');

                // correctly filled in, passwords mismatch          
                $browser          
                    ->visit(route('ims.users.create'))
                    ->type('name', $userTest->name)
                    ->type('email', $userTest->email)                    
                    ->type('password', 'secret')
                    ->type('password_confirmation', 'asdfasdf')
                    ->press('Submit')
                    ->assertSee('The password confirmation does not match');                                        


                // valid user test, but email existing
                $browser
                    ->visit(route('ims.users.create'))
                    ->type('name',$userTest->name)
                    ->type('email', $existingEmail)
                    ->type('password', 'secret')
                    ->type('password_confirmation', 'secret')
                    ->press('Submit')
                    ->assertSee('The email has already been taken');
                    

                // valid user test
                $browser
                    ->visit(route('ims.users.create'))
                    ->type('name',$userTest->name)
                    ->type('email',$userTest->email)
                    ->type('password', 'secret')
                    ->type('password_confirmation', 'secret')
                    ->press('Submit');

                // find how many records are in the database ahead of it,
                // and calculate which page the result should be on

                $insertedUser = User::where('email', $userTest->email)->first();
                $position = User::find($insertedUser->id)->count();
                $page = floor(($position - 1) /10) +1;

                $browser->visit(route('ims.users.index') . '?page=' . $page)
                    ->assertSee($userTest->name)
                    ->assertSee($userTest->email);    

                // clear up messs
                User::destroy($insertedUser->id);

        });



    }
}
