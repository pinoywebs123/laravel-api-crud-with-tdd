<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LoginTest extends TestCase
{
	use RefreshDatabase;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_login_user_valid()
    {
    	$user = factory('App\User')->create();

        $response = $this->post('/api/auth/login', [
        	'username'=> $user->username,
        	'password'=> 'secret'
        ]);

        $response->assertStatus(200)
            ->assertJsonStructure([
                    'access_token',
                    'token_type',
                    'expires_in',
                ]
            );
       
    }

    public function test_login_user_invalid_password()
    {
        $user = factory('App\User')->create();

        $response = $this->post('/api/auth/login', [
            'username'=>  $user->username,
            'password'=> 'secret2'
        ]);

        $response->assertStatus(401)
                ->assertJsonStructure([
                    'error'
                ])
        ;
    }
}
