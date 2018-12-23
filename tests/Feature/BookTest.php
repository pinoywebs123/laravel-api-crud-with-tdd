<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tymon\JWTAuth\Facades\JWTAuth;

class BookTest extends TestCase
{
	use RefreshDatabase;
	protected $headers = ['Accept' => 'application/json'];
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_view_all_books()
    {
    	
    	$user = factory('App\User')->create();
    	$book = factory('App\Book')->create();

    	$token = JWTAuth::fromUser($user);
        $this->headers['Authorization'] = 'Bearer '.$token;
        JWTAuth::setToken($token);

        $response = $this->get('/api/books', $this->headers)
        		->assertStatus(200)
        		->assertJson([
        			[
        				'id'=> $book->id,
        				'name'=> $book->name,

        			]
        				
        		])
        		->assertJsonStructure([
        			[
        				'id',
        				'name',
        				'created_at',
        				'updated_at'
        			]
        		])
        	;
    }

    public function test_view_specific_book()
    {
    	$user = factory('App\User')->create();
    	$book = factory('App\Book')->create();

    	$token = JWTAuth::fromUser($user);
        $this->headers['Authorization'] = 'Bearer '.$token;
        JWTAuth::setToken($token);

        $response = $this->get('/api/books/'.$book->id, $this->headers)
        	->assertStatus(200)
        	->assertJsonStructure(
        			[
        				'id',
        				'name',
        				'created_at',
        				'updated_at'
        			]
        		)
        	;
    }

    public function test_delete_book()
    {
    	$user = factory('App\User')->create();
    	$book = factory('App\Book')->create();

    	$token = JWTAuth::fromUser($user);
        $this->headers['Authorization'] = 'Bearer '.$token;
        JWTAuth::setToken($token);

        $response = $this->delete('/api/books/'.$book->id,[], $this->headers)
        	->assertStatus(200)
        	
        	;
    }

    public function test_create_book()
    {
    	$user = factory('App\User')->create();
    	$book = factory('App\Book')->create();

    	$token = JWTAuth::fromUser($user);
        $this->headers['Authorization'] = 'Bearer '.$token;
        JWTAuth::setToken($token);

        $response = $this->post('/api/books',[
        	'name'=> $book->name
        ],$this->headers)
        	->assertStatus(200)
        	->assertJson(['name'=> $book->name])
        ;
    }
}
