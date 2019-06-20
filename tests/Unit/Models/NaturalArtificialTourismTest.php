<?php

namespace Tests\Unit\Models;

use App\User;
use App\NaturalArtificialTourism;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class NaturalArtificialTourismTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_natural_artificial_tourism_has_name_link_attribute()
    {
        $naturalArtificialTourism = factory(NaturalArtificialTourism::class)->create();

        $title = __('app.show_detail_title', [
            'name' => $naturalArtificialTourism->name, 'type' => __('natural_artificial_tourism.natural_artificial_tourism'),
        ]);
        $link = '<a href="'.route('natural_artificial_tourisms.show', $naturalArtificialTourism).'"';
        $link .= ' title="'.$title.'">';
        $link .= $naturalArtificialTourism->name;
        $link .= '</a>';

        $this->assertEquals($link, $naturalArtificialTourism->name_link);
    }

    /** @test */
    public function a_natural_artificial_tourism_has_belongs_to_creator_relation()
    {
        $naturalArtificialTourism = factory(NaturalArtificialTourism::class)->make();

        $this->assertInstanceOf(User::class, $naturalArtificialTourism->creator);
        $this->assertEquals($naturalArtificialTourism->creator_id, $naturalArtificialTourism->creator->id);
    }
}
