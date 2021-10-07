<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class APITest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->json('POST', '/register/434293');

        $this->seeStatusCode(200);
        $res_array = (array)json_decode($this->response->content());
        $this->assertArrayHasKey('uuid', $res_array);
    }
}
