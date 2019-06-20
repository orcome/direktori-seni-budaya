<?php

namespace Tests\Unit\Models;

use App\User;
use App\RitualCeremony;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RitualCeremonyTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_ritual_ceremony_has_name_link_attribute()
    {
        $ritualCeremony = factory(RitualCeremony::class)->create();

        $title = __('app.show_detail_title', [
            'name' => $ritualCeremony->name, 'type' => __('ritual_ceremony.ritual_ceremony'),
        ]);
        $link = '<a href="'.route('ritual_ceremonies.show', $ritualCeremony).'"';
        $link .= ' title="'.$title.'">';
        $link .= $ritualCeremony->name;
        $link .= '</a>';

        $this->assertEquals($link, $ritualCeremony->name_link);
    }

    /** @test */
    public function a_ritual_ceremony_has_belongs_to_creator_relation()
    {
        $ritualCeremony = factory(RitualCeremony::class)->make();

        $this->assertInstanceOf(User::class, $ritualCeremony->creator);
        $this->assertEquals($ritualCeremony->creator_id, $ritualCeremony->creator->id);
    }
}
