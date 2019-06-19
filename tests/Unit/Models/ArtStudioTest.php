<?php

namespace Tests\Unit\Models;

use App\User;
use App\ArtStudio;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ArtStudioTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_art_studio_has_name_link_attribute()
    {
        $artStudio = factory(ArtStudio::class)->create();

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
}
