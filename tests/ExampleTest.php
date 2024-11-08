<?php

namespace Tests\Feature;

use Tests\TestCase;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;


class ExampleTest extends TestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        $response = $this->get('/');  // Use 'get' to make a GET request to the home route
        
        $response->assertStatus(200);  // Check that the response status is 200 (OK)
        $response->assertSee('Laravel');  // Check that the response contains 'Laravel'
    }
}
