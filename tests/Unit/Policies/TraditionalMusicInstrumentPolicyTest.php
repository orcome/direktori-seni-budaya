<?php

namespace Tests\Unit\Policies;

use App\TraditionalMusicInstrument;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TraditionalMusicInstrumentPolicyTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_create_traditional_music_instrument()
    {
        $user = $this->createUser();
        $this->assertTrue($user->can('create', new TraditionalMusicInstrument));
    }

    /** @test */
    public function user_can_view_traditional_music_instrument()
    {
        $user = $this->createUser();
        $traditionalMusicInstrument = factory(TraditionalMusicInstrument::class)->create();
        $this->assertTrue($user->can('view', $traditionalMusicInstrument));
    }

    /** @test */
    public function user_can_update_traditional_music_instrument()
    {
        $user = $this->createUser();
        $traditionalMusicInstrument = factory(TraditionalMusicInstrument::class)->create();
        $this->assertTrue($user->can('update', $traditionalMusicInstrument));
    }

    /** @test */
    public function user_can_delete_traditional_music_instrument()
    {
        $user = $this->createUser();
        $traditionalMusicInstrument = factory(TraditionalMusicInstrument::class)->create();
        $this->assertTrue($user->can('delete', $traditionalMusicInstrument));
    }
}
