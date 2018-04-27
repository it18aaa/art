<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use App\User;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class IMSAddCMSUserRoleTest extends DuskTestCase
{

    public function testAddCMSUserRole()
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
                'id' => $userTest->id,
                'email' => $userTest->email,
            ]);            

            // default access is blocked
            $browser
                ->loginAs(User::find($userTest->id))
                ->visit(route('cms.index'))  
                ->assertSee('not allowed')
                ->logout();
                
                
            // calculate which page the user will be in the index
            $position = User::find($userTest->id)->count();
            $page = floor(($position - 1) /10) +1;            

            // log in as admin, change role
            $browser
                ->loginAs(User::find(3))
                ->visit(route('ims.users.index') . '?page=' . $page)
                ->assertSee($userTest->name)
                ->assertSee($userTest->email)                                                  
                ->click('#roleAttach-2-'. $userTest->id)    // role 2 is a cms user
                ->logout();                
            
            // login as user and ensure role is working
            $browser
                ->loginAs(User::find($userTest->id))
                ->visit(route('cms.index'))            
                ->assertSee('Content Management')
                ->logout();

            // remove cms role
            $browser
                ->loginAs(User::find(3))
                ->visit(route('ims.users.index') . '?page=' . $page)
                ->assertSee($userTest->name)
                ->assertSee($userTest->email)
                ->click('#roleDetach-2-'. $userTest->id)   // role 2 is a cms user
                ->logout();  

            // access should be blocked
            $browser
                ->loginAs(User::find($userTest->id))
                ->visit(route('cms.index'))  
                ->assertSee('not allowed')
                ->logout();
                
            // clear up !
            User::destroy($userTest->id);

        });



    }
}
