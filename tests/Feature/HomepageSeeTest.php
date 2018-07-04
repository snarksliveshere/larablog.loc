<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HomepageSeeTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testHomepageSeeTest()
    {
        $response = $this->get('/');

        $response->assertSeeText('Наша продукция');
    }
}
