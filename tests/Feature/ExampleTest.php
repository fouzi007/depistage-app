<?php

namespace Tests\Feature;

use App\Role;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testUserCanLogin() {
    	$response = $this->get('login');

    	$response->assertStatus(200);

    	$this->post('login',[
    		'email' => 'admin@gmail.com',
		    'password' => 'fnoual123'
	    ]);

    	$this->assertTrue(auth()->check());
    }

    public function testUserCanRegister() {
		$this->assertTrue(true);
    }
}
