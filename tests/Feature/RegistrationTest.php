<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RegisterTest extends TestCase
{

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testRegistration()
    {
        $response = $this->get('/register');

        $this->type('name', 'name');
        $this->type('someemail@email.com', 'email');
        $this->type('123456', 'password');
        $this->press('Зарегистрироваться');
        $this->press('Зарегистрироваться');
        $this->seePageIs('/login');
        $this->see('Войти');

    }
}
