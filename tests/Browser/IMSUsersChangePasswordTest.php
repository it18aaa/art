<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use App\User;
use App\Role;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class IMSUsersChangePasswordTest extends DuskTestCase
{
    public function testUsersChangePassword()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/');

            // create a unique user
            do {
                $userTest = factory(User::class)->make();                
            } while( User::where('email', $userTest->email )->count() > 0);

            $userTest->save();

            $role = Role::find(1);
            $userTest->roles()->attach($role);

            $position = User::find($userTest->id)->count();
            $page = floor(($position - 1) /10) +1;            

            
            // login as admin
            $browser
                ->loginAs(User::find(3));

            // failign tests
            $browser
                ->visit(route('ims.users.index') . '?page=' . $page)                
                ->click('#password-'. $userTest->id )
                ->type('password', 'bonz4545sdaobananas')
                ->type('password_confirmation', 'bosf25245d33bananas')
                ->press('submit')
                ->assertSee('The password confirmation does not match');

            $browser
                ->type('password', '')
                ->type('password_confirmation', 'bosf25245d33bananas')
                ->press('submit')
                ->assertSee('The password field is required');

            $browser
                ->type('password', 'safdasdfdsaf')
                ->type('password_confirmation', '')
                ->press('submit')
                ->assertSee('The password confirmation does not match');

            $browser
                ->type('password', '')
                ->type('password_confirmation', '')
                ->press('submit')
                ->assertSee('The password field is required');

            $browser
                ->visit(route('ims.users.index') . '?page=' . $page)                
                ->click('#password-'. $userTest->id )
                ->type('password', 'bonzobananas')
                ->type('password_confirmation', 'bonzobananas')
                ->press('submit')
                ->assertSee('Password successfully changed');

            // manually log in with a changed password
            $browser
                ->logout()
                ->visit(route('login'))
                ->type('email', $userTest->email)
                ->type('password', 'bonzobananas')
                ->press('Login')
                ->assertSee('Information Management System')
                ->pause(10000)
                ->logout();
              
            // all done.  Nothing to see here, move along
            User::destroy($userTest->id);

        });
    }

}