<?php

namespace Tests\Unit\Policies;

use App\SubDistrict;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SubDistrictPolicyTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_create_sub_district()
    {
        $user = $this->createUser();
        $this->assertTrue($user->can('create', new SubDistrict));
    }

    /** @test */
    public function user_can_view_sub_district()
    {
        $user = $this->createUser();
        $subDistrict = factory(SubDistrict::class)->create();
        $this->assertTrue($user->can('view', $subDistrict));
    }

    /** @test */
    public function user_can_update_sub_district()
    {
        $user = $this->createUser();
        $subDistrict = factory(SubDistrict::class)->create();
        $this->assertTrue($user->can('update', $subDistrict));
    }

    /** @test */
    public function user_can_delete_sub_district()
    {
        $user = $this->createUser();
        $subDistrict = factory(SubDistrict::class)->create();
        $this->assertTrue($user->can('delete', $subDistrict));
    }
}
