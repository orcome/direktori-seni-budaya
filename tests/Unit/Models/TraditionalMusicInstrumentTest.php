<?php

namespace Tests\Unit\Models;

use App\User;
use App\TraditionalMusicInstrument;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TraditionalMusicInstrumentTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_traditional_music_instrument_has_name_link_attribute()
    {
        $traditionalMusicInstrument = factory(TraditionalMusicInstrument::class)->create();

        $title = __('app.show_detail_title', [
            'name' => $traditionalMusicInstrument->name, 'type' => __('traditional_music_instrument.traditional_music_instrument'),
        ]);
        $link = '<a href="'.route('traditional_music_instruments.show', $traditionalMusicInstrument).'"';
        $link .= ' title="'.$title.'">';
        $link .= $traditionalMusicInstrument->name;
        $link .= '</a>';

        $this->assertEquals($link, $traditionalMusicInstrument->name_link);
    }

    /** @test */
    public function a_traditional_music_instrument_has_belongs_to_creator_relation()
    {
        $traditionalMusicInstrument = factory(TraditionalMusicInstrument::class)->make();

        $this->assertInstanceOf(User::class, $traditionalMusicInstrument->creator);
        $this->assertEquals($traditionalMusicInstrument->creator_id, $traditionalMusicInstrument->creator->id);
    }
}
