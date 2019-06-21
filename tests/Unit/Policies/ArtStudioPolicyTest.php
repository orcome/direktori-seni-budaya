<?php

namespace Tests\Unit\Policies;

use App\ArtStudio;
use Tests\TestCase;
use App\SubDistrict;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ArtStudioPolicyTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_create_art_studio()
    {
        $user = $this->createUser();
        $this->assertTrue($user->can('create', new ArtStudio));
    }

    /** @test */
    public function user_can_view_art_studio()
    {
        $user = $this->createUser();
        $subDistrict = factory(SubDistrict::class)->create();
        $artStudio = factory(ArtStudio::class)->create([
            'sub_district_id' => $subDistrict->id,
        ]);
        $this->assertTrue($user->can('view', $artStudio));
    }

    /** @test */
    public function user_can_update_art_studio()
    {
        $user = $this->createUser();
        $subDistrict = factory(SubDistrict::class)->create();
        $artStudio = factory(ArtStudio::class)->create([
            'sub_district_id' => $subDistrict->id,
        ]);
        $this->assertTrue($user->can('update', $artStudio));
    }

    /** @test */
    public function user_can_delete_art_studio()
    {
        $user = $this->createUser();
        $subDistrict = factory(SubDistrict::class)->create();
        $artStudio = factory(ArtStudio::class)->create([
            'sub_district_id' => $subDistrict->id,
        ]);
        $this->assertTrue($user->can('delete', $artStudio));
    }
}
