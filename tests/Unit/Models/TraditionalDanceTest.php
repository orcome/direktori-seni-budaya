<?php

namespace Tests\Unit\Models;

use App\User;
use App\TraditionalDance;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TraditionalDanceTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_traditional_dance_has_name_link_attribute()
    {
        $traditionalDance = factory(TraditionalDance::class)->create();

        $title = __('app.show_detail_title', [
            'name' => $traditionalDance->name, 'type' => __('traditional_dance.traditional_dance'),
        ]);
        $link = '<a href="'.route('traditional_dances.show', $traditionalDance).'"';
        $link .= ' title="'.$title.'">';
        $link .= $traditionalDance->name;
        $link .= '</a>';

        $this->assertEquals($link, $traditionalDance->name_link);
    }

    /** @test */
    public function a_traditional_dance_has_belongs_to_creator_relation()
    {
        $traditionalDance = factory(TraditionalDance::class)->make();

        $this->assertInstanceOf(User::class, $traditionalDance->creator);
        $this->assertEquals($traditionalDance->creator_id, $traditionalDance->creator->id);
    }
}
