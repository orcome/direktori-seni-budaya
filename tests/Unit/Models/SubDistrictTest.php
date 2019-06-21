<?php

namespace Tests\Unit\Models;

use App\User;
use App\SubDistrict;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SubDistrictTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_sub_district_has_name_link_attribute()
    {
        $subDistrict = factory(SubDistrict::class)->create();

        $title = __('app.show_detail_title', [
            'name' => $subDistrict->name, 'type' => __('sub_district.sub_district'),
        ]);
        $link = '<a href="'.route('sub_districts.show', $subDistrict).'"';
        $link .= ' title="'.$title.'">';
        $link .= $subDistrict->name;
        $link .= '</a>';

        $this->assertEquals($link, $subDistrict->name_link);
    }

    /** @test */
    public function a_sub_district_has_belongs_to_creator_relation()
    {
        $subDistrict = factory(SubDistrict::class)->make();

        $this->assertInstanceOf(User::class, $subDistrict->creator);
        $this->assertEquals($subDistrict->creator_id, $subDistrict->creator->id);
    }
}
