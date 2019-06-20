<?php

namespace Tests\Unit\Policies;

use App\RitualCeremony;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RitualCeremonyPolicyTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_create_ritual_ceremony()
    {
        $user = $this->createUser();
        $this->assertTrue($user->can('create', new RitualCeremony));
    }

    /** @test */
    public function user_can_view_ritual_ceremony()
    {
        $user = $this->createUser();
        $ritualCeremony = factory(RitualCeremony::class)->create();
        $this->assertTrue($user->can('view', $ritualCeremony));
    }

    /** @test */
    public function user_can_update_ritual_ceremony()
    {
        $user = $this->createUser();
        $ritualCeremony = factory(RitualCeremony::class)->create();
        $this->assertTrue($user->can('update', $ritualCeremony));
    }

    /** @test */
    public function user_can_delete_ritual_ceremony()
    {
        $user = $this->createUser();
        $ritualCeremony = factory(RitualCeremony::class)->create();
        $this->assertTrue($user->can('delete', $ritualCeremony));
    }
}
