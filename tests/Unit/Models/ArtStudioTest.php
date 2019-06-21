<?php

namespace Tests\Unit\Models;

use App\User;
use App\ArtStudio;
use Tests\TestCase;
use App\SubDistrict;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ArtStudioTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_art_studio_has_name_link_attribute()
    {
        $subDistrict = factory(SubDistrict::class)->create();
        $artStudio = factory(ArtStudio::class)->create([
            'sub_district_id' => $subDistrict->id,
        ]);

        $title = __('app.show_detail_title', [
            'name' => $artStudio->name, 'type' => __('art_studio.art_studio'),
        ]);
        $link = '<a href="'.route('art_studios.show', $artStudio).'"';
        $link .= ' title="'.$title.'">';
        $link .= $artStudio->name;
        $link .= '</a>';

        $this->assertEquals($link, $artStudio->name_link);
    }

    /** @test */
    public function a_art_studio_has_belongs_to_creator_relation()
    {
        $artStudio = factory(ArtStudio::class)->make();

        $this->assertInstanceOf(User::class, $artStudio->creator);
        $this->assertEquals($artStudio->creator_id, $artStudio->creator->id);
    }

    /** @test */
    public function a_art_studio_has_belongs_to_sub_district_relation()
    {
        $artStudio = factory(ArtStudio::class)->make();

        $this->assertInstanceOf(SubDistrict::class, $artStudio->subDistrict);
        $this->assertEquals($artStudio->sub_district_id, $artStudio->subDistrict->id);
    }
}
