<?php

namespace Tests\Unit\Models;

use App\User;
use App\TraditionalCeremony;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TraditionalCeremonyTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_traditional_ceremony_has_name_link_attribute()
    {
        $traditionalCeremony = factory(TraditionalCeremony::class)->create();

        $title = __('app.show_detail_title', [
            'name' => $traditionalCeremony->name, 'type' => __('traditional_ceremony.traditional_ceremony'),
        ]);
        $link = '<a href="'.route('traditional_ceremonies.show', $traditionalCeremony).'"';
        $link .= ' title="'.$title.'">';
        $link .= $traditionalCeremony->name;
        $link .= '</a>';

        $this->assertEquals($link, $traditionalCeremony->name_link);
    }

    /** @test */
    public function a_traditional_ceremony_has_belongs_to_creator_relation()
    {
        $traditionalCeremony = factory(TraditionalCeremony::class)->make();

        $this->assertInstanceOf(User::class, $traditionalCeremony->creator);
        $this->assertEquals($traditionalCeremony->creator_id, $traditionalCeremony->creator->id);
    }
}
