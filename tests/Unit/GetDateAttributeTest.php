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

class GetDateAttributeTest extends TestCase
{
    protected $checkDate;

    protected function setUp()
    {
        parent::setUp();
        $this->checkDate = Post::find(1)->firstOrFail()->date;

//        $this->checkDate->date = '24/09/15';

    }

    public function testGetDate()
    {
//        $this->assertEquals('September 24, 2015', $this->checkDate->getDate());
        $this->assertEquals('13/06/18', $this->checkDate);
    }
}