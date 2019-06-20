<?php

namespace Tests\Unit\Policies;

use App\NaturalArtificialTourism;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class NaturalArtificialTourismPolicyTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_create_natural_artificial_tourism()
    {
        $user = $this->createUser();
        $this->assertTrue($user->can('create', new NaturalArtificialTourism));
    }

    /** @test */
    public function user_can_view_natural_artificial_tourism()
    {
        $user = $this->createUser();
        $naturalArtificialTourism = factory(NaturalArtificialTourism::class)->create();
        $this->assertTrue($user->can('view', $naturalArtificialTourism));
    }

    /** @test */
    public function user_can_update_natural_artificial_tourism()
    {
        $user = $this->createUser();
        $naturalArtificialTourism = factory(NaturalArtificialTourism::class)->create();
        $this->assertTrue($user->can('update', $naturalArtificialTourism));
    }

    /** @test */
    public function user_can_delete_natural_artificial_tourism()
    {
        $user = $this->createUser();
        $naturalArtificialTourism = factory(NaturalArtificialTourism::class)->create();
        $this->assertTrue($user->can('delete', $naturalArtificialTourism));
    }
}
