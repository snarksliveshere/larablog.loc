<?php
/**
 * Created by PhpStorm.
 * User: -
 * Date: 04.07.2018
 * Time: 22:45
 */

namespace Test\Unit;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Post;
use Tests\TestCase;

class GetDateTest extends TestCase
{
    public function testGetDate()
    {
        $post = Post::find(1)->firstOrFail();
        $this->assertEquals('June 13, 2018', $post->getDate());
    }
}