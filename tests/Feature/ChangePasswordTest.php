<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ChangePasswordTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function user_can_change_password()
    {
        $user = $this->loginAsUser([
            'password' => bcrypt('password'),
        ]);

        $this->visit(route('home'));
        $this->click(__('auth.change_password'));

        $this->submitForm(__('auth.change_password'), [
            'old_password'              => 'password',
            'new_password'              => 'inipasswordbaru',
            'new_password_confirmation' => 'inipasswordbaru',
        ]);

        $this->seeText(__('auth.change_password_success'));

        $this->assertTrue(
            app('hash')->check('inipasswordbaru', $user->password),
            'The password should changed!'
        );
    }

    /** @test */
    public function user_cannot_change_password_if_old_password_wrong()
    {
        $user = $this->loginAsUser([
            'password' => bcrypt('password'),
        ]);

        $this->visit(route('home'));
        $this->click(__('auth.change_password'));

        $this->submitForm(__('auth.change_password'), [
            'old_password'              => 'passwordss',
            'new_password'              => 'newpassword',
            'new_password_confirmation' => 'newpassword',
        ]);

        $this->seeText(__('passwords.old_password'));

        $this->assertTrue(
            app('hash')->check('secret', $user->password),
            'The password shouldn\'t changed!'
        );
    }
}
