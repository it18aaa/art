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
    public function testExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSee('Von Sprinkles');

            // log in as root!
            $browser->loginAs(User::find(3))
                ->visit(route('ims.users.create'))
                ->type('name','biffo')
                ->type('email','biffo@hotmail.com')
                ->type('password', 'secret')
                ->type('password_confirmation', 'secret')
                ->press('Submit');

            $browser->pause(2000);
        });
    }
}
