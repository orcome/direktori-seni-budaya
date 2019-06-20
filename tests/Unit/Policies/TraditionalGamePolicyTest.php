<?php

namespace Tests\Unit\Policies;

use App\TraditionalGame;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TraditionalGamePolicyTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_create_traditional_game()
    {
        $user = $this->createUser();
        $this->assertTrue($user->can('create', new TraditionalGame));
    }

    /** @test */
    public function user_can_view_traditional_game()
    {
        $user = $this->createUser();
        $traditionalGame = factory(TraditionalGame::class)->create();
        $this->assertTrue($user->can('view', $traditionalGame));
    }

    /** @test */
    public function user_can_update_traditional_game()
    {
        $user = $this->createUser();
        $traditionalGame = factory(TraditionalGame::class)->create();
        $this->assertTrue($user->can('update', $traditionalGame));
    }

    /** @test */
    public function user_can_delete_traditional_game()
    {
        $user = $this->createUser();
        $traditionalGame = factory(TraditionalGame::class)->create();
        $this->assertTrue($user->can('delete', $traditionalGame));
    }
}
