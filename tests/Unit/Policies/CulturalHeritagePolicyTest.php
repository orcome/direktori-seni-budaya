<?php

namespace Tests\Unit\Policies;

use Tests\TestCase;
use App\SubDistrict;
use App\CulturalHeritage;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CulturalHeritagePolicyTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_create_cultural_heritage()
    {
        $user = $this->createUser();
        $this->assertTrue($user->can('create', new CulturalHeritage));
    }

    /** @test */
    public function user_can_view_cultural_heritage()
    {
        $user = $this->createUser();
        $subDistrict = factory(SubDistrict::class)->create();
        $culturalHeritage = factory(CulturalHeritage::class)->create([
            'sub_district_id' => $subDistrict->id,
        ]);
        $this->assertTrue($user->can('view', $culturalHeritage));
    }

    /** @test */
    public function user_can_update_cultural_heritage()
    {
        $user = $this->createUser();
        $subDistrict = factory(SubDistrict::class)->create();
        $culturalHeritage = factory(CulturalHeritage::class)->create([
            'sub_district_id' => $subDistrict->id,
        ]);
        $this->assertTrue($user->can('update', $culturalHeritage));
    }

    /** @test */
    public function user_can_delete_cultural_heritage()
    {
        $user = $this->createUser();
        $subDistrict = factory(SubDistrict::class)->create();
        $culturalHeritage = factory(CulturalHeritage::class)->create([
            'sub_district_id' => $subDistrict->id,
        ]);
        $this->assertTrue($user->can('delete', $culturalHeritage));
    }
}
