<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SignUpTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testRegistrationUser()
    {
        $response = $this->post(route('user.register'),[
        	'email' => 'email@emailtest.com',
        	'name' => 'nameusertest',
        	'password' => 'somepassword'

        ])->assertSuccessful();
        
        $user = User::whereEmail('email@emailtest.com')->firstOrFail();
        $this->assertNotNull($user);
        $this->assertEquals($user->id, $response->get('id'));

        
    }
}
