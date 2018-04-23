<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use App\User;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class IMSUserEditTest extends DuskTestCase
{
   
    public function testEditUser()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/');

            //   create two unique users
            //   and get an existing email address

            // add first user to database
            // login as admin and go to page of first user.

            // user second user details and existing email address to change details
            

            do {
                $userTest = factory(User::class)->make();                
            } 
            while( User::where('email', $userTest->email )->count() > 0);

            $userTest->save();
            $nameOrig = $userTest->name;            
            $emailOrig = $userTest->email;            
            $emailExisting = User::first()->email;

            do {
                $userNew = factory(User::class)->make();                
            }
            while( User::where('email', $userNew->email )->count() > 0);

            // find index page number        
            $position = User::find($userTest->id)->count();
            $page = floor(($position - 1) /10) +1;

            // check form opens
            $browser
                ->loginAs(User::find(3))
                ->visit(route('ims.users.index') . '?page=' . $page)
                ->assertSee($userTest->name)
                ->assertSee($userTest->email)   
                ->click('#edit-'.$userTest->id)
                ->assertSee('Edit User')
                ->assertInputValue('name' , $userTest->name)
                ->assertInputValue('email', $userTest->email);
            
                // change name
            $browser   
                ->type('name', $userNew->name)
                ->press('Submit')
                ->visit(route('ims.users.index') . '?page=' . $page)
                ->assertSee($userNew->name)
                ->assertSee($emailOrig)
                ->assertDontSee($nameOrig);

            // change email
            $browser
                ->click('#edit-'.$userTest->id)
                ->assertSee('Edit User')
                ->assertInputValue('name' , $userNew->name)
                ->assertInputValue('email', $emailOrig)
                ->type('email', $userNew->email)

                ->press('Submit')
                ->visit(route('ims.users.index') . '?page=' . $page)
                ->assertSee($userNew->name)
                ->assertSee($userNew->email)
                ->assertDontSee($emailOrig)
                ->assertDontSee($nameOrig);

            // existing email
            $browser
                ->click('#edit-'.$userTest->id)
                ->type('email', $emailExisting)
                ->press('Submit')
                ->assertSee('The email has already been taken');

            // no name
            $browser
                ->visit(route('ims.users.index') . '?page=' . $page)  
                ->click('#edit-'.$userTest->id)
                ->type('name','')
                ->press('Submit')
                ->assertSee('The name field is required');

            // no email
            $browser
                ->visit(route('ims.users.index') . '?page=' . $page)  
                ->click('#edit-'.$userTest->id)
                ->type('email','')
                ->press('Submit')
                ->assertSee('The email field is required');

            // two blank fields
            $browser
                ->visit(route('ims.users.index') . '?page=' . $page)  
                ->click('#edit-'.$userTest->id)
                ->type('name','')
                ->type('email','')
                ->press('Submit')
                ->assertSee('The name field is required')
                ->assertSee('The email field is required');

            // try an invalid email
            $browser
                ->visit(route('ims.users.index') . '?page=' . $page)  
                ->click('#edit-'.$userTest->id)
                ->type('name',$userNew->name)
                ->type('email',$userNew->name)
                ->press('Submit')
                ->assertSee('The email must be a valid email address');                

            // clear up
            User::destroy($userTest->id);


        });
    }
}