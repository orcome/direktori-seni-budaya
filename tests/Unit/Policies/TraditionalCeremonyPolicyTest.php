<?php

namespace Tests\Unit\Policies;

use App\TraditionalCeremony;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TraditionalCeremonyPolicyTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_create_traditional_ceremony()
    {
        $user = $this->createUser();
        $this->assertTrue($user->can('create', new TraditionalCeremony));
    }

    /** @test */
    public function user_can_view_traditional_ceremony()
    {
        $user = $this->createUser();
        $traditionalCeremony = factory(TraditionalCeremony::class)->create();
        $this->assertTrue($user->can('view', $traditionalCeremony));
    }

    /** @test */
    public function user_can_update_traditional_ceremony()
    {
        $user = $this->createUser();
        $traditionalCeremony = factory(TraditionalCeremony::class)->create();
        $this->assertTrue($user->can('update', $traditionalCeremony));
    }

    /** @test */
    public function user_can_delete_traditional_ceremony()
    {
        $user = $this->createUser();
        $traditionalCeremony = factory(TraditionalCeremony::class)->create();
        $this->assertTrue($user->can('delete', $traditionalCeremony));
    }
}
