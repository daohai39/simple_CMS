<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AuthenticationTest extends AdminTestCase
{
    /**
     * @test
     */
    public function it_should_login_successfully()
    {
        $user = $this->mockAdmin();

        $this->visitRoute('login')
            ->type('admin@decoks.dev', 'email')
            ->type('admin@decoks.dev', 'password')
            ->press('Sign In')
            ->seeRouteIs('admin.dashboard');
    }

    /**
     * @test
     */
    public function it_should_required_needed_fields()
    {
        $this->visitRoute('login')
            ->type('', 'email')
            ->type('', 'password')
            ->press('Sign In')
            ->see('The email field is required.')
            ->see('The password field is required.');
    }

    /**
     * @test
     */
    public function it_cannot_find_matched_credentials()
    {
        $this->visitRoute('login')
            ->type('admin@decoks.dev', 'email')
            ->type('admin@decoks.dev', 'password')
            ->press('Sign In')
            ->see('These credentials do not match our records.');
    }
}
