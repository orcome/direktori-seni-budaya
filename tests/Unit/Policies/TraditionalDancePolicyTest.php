<?php

namespace Tests\Unit\Policies;

use App\TraditionalDance;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TraditionalDancePolicyTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_create_traditional_dance()
    {
        $user = $this->createUser();
        $this->assertTrue($user->can('create', new TraditionalDance));
    }

    /** @test */
    public function user_can_view_traditional_dance()
    {
        $user = $this->createUser();
        $traditionalDance = factory(TraditionalDance::class)->create();
        $this->assertTrue($user->can('view', $traditionalDance));
    }

    /** @test */
    public function user_can_update_traditional_dance()
    {
        $user = $this->createUser();
        $traditionalDance = factory(TraditionalDance::class)->create();
        $this->assertTrue($user->can('update', $traditionalDance));
    }

    /** @test */
    public function user_can_delete_traditional_dance()
    {
        $user = $this->createUser();
        $traditionalDance = factory(TraditionalDance::class)->create();
        $this->assertTrue($user->can('delete', $traditionalDance));
    }
}
