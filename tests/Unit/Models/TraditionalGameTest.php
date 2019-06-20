<?php

namespace Tests\Unit\Models;

use App\User;
use App\TraditionalGame;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TraditionalGameTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_traditional_game_has_name_link_attribute()
    {
        $traditionalGame = factory(TraditionalGame::class)->create();

        $title = __('app.show_detail_title', [
            'name' => $traditionalGame->name, 'type' => __('traditional_game.traditional_game'),
        ]);
        $link = '<a href="'.route('traditional_games.show', $traditionalGame).'"';
        $link .= ' title="'.$title.'">';
        $link .= $traditionalGame->name;
        $link .= '</a>';

        $this->assertEquals($link, $traditionalGame->name_link);
    }

    /** @test */
    public function a_traditional_game_has_belongs_to_creator_relation()
    {
        $traditionalGame = factory(TraditionalGame::class)->make();

        $this->assertInstanceOf(User::class, $traditionalGame->creator);
        $this->assertEquals($traditionalGame->creator_id, $traditionalGame->creator->id);
    }
}
