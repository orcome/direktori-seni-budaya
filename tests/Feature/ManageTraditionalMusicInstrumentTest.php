<?php

namespace Tests\Feature;

use App\TraditionalMusicInstrument;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ManageTraditionalMusicInstrumentTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_see_traditional_music_instrument_list_in_traditional_music_instrument_index_page()
    {
        $traditionalMusicInstrument = factory(TraditionalMusicInstrument::class)->create();

        $this->loginAsUser();
        $this->visitRoute('traditional_music_instruments.index');
        $this->see($traditionalMusicInstrument->name);
    }

    private function getCreateFields(array $overrides = [])
    {
        return array_merge([
            'name'        => 'TraditionalMusicInstrument 1 name',
            'description' => 'TraditionalMusicInstrument 1 description',
        ], $overrides);
    }

    /** @test */
    public function user_can_create_a_traditional_music_instrument()
    {
        $this->loginAsUser();
        $this->visitRoute('traditional_music_instruments.index');

        $this->click(__('traditional_music_instrument.create'));
        $this->seeRouteIs('traditional_music_instruments.create');

        $this->submitForm(__('traditional_music_instrument.create'), $this->getCreateFields());

        $this->seeRouteIs('traditional_music_instruments.show', TraditionalMusicInstrument::first());

        $this->seeInDatabase('traditional_music_instruments', $this->getCreateFields());
    }

    /** @test */
    public function validate_traditional_music_instrument_name_is_required()
    {
        $this->loginAsUser();

        // name empty
        $this->post(route('traditional_music_instruments.store'), $this->getCreateFields(['name' => '']));
        $this->assertSessionHasErrors('name');
    }

    /** @test */
    public function validate_traditional_music_instrument_name_is_not_more_than_60_characters()
    {
        $this->loginAsUser();

        // name 70 characters
        $this->post(route('traditional_music_instruments.store'), $this->getCreateFields([
            'name' => str_repeat('Test Title', 7),
        ]));
        $this->assertSessionHasErrors('name');
    }

    /** @test */
    public function validate_traditional_music_instrument_description_is_not_more_than_255_characters()
    {
        $this->loginAsUser();

        // description 256 characters
        $this->post(route('traditional_music_instruments.store'), $this->getCreateFields([
            'description' => str_repeat('Long description', 16),
        ]));
        $this->assertSessionHasErrors('description');
    }

    private function getEditFields(array $overrides = [])
    {
        return array_merge([
            'name'        => 'TraditionalMusicInstrument 1 name',
            'description' => 'TraditionalMusicInstrument 1 description',
        ], $overrides);
    }

    /** @test */
    public function user_can_edit_a_traditional_music_instrument()
    {
        $this->loginAsUser();
        $traditionalMusicInstrument = factory(TraditionalMusicInstrument::class)->create(['name' => 'Testing 123']);

        $this->visitRoute('traditional_music_instruments.show', $traditionalMusicInstrument);
        $this->click('edit-traditional_music_instrument-'.$traditionalMusicInstrument->id);
        $this->seeRouteIs('traditional_music_instruments.edit', $traditionalMusicInstrument);

        $this->submitForm(__('traditional_music_instrument.update'), $this->getEditFields());

        $this->seeRouteIs('traditional_music_instruments.show', $traditionalMusicInstrument);

        $this->seeInDatabase('traditional_music_instruments', $this->getEditFields([
            'id' => $traditionalMusicInstrument->id,
        ]));
    }

    /** @test */
    public function validate_traditional_music_instrument_name_update_is_required()
    {
        $this->loginAsUser();
        $traditional_music_instrument = factory(TraditionalMusicInstrument::class)->create(['name' => 'Testing 123']);

        // name empty
        $this->patch(route('traditional_music_instruments.update', $traditional_music_instrument), $this->getEditFields(['name' => '']));
        $this->assertSessionHasErrors('name');
    }

    /** @test */
    public function validate_traditional_music_instrument_name_update_is_not_more_than_60_characters()
    {
        $this->loginAsUser();
        $traditional_music_instrument = factory(TraditionalMusicInstrument::class)->create(['name' => 'Testing 123']);

        // name 70 characters
        $this->patch(route('traditional_music_instruments.update', $traditional_music_instrument), $this->getEditFields([
            'name' => str_repeat('Test Title', 7),
        ]));
        $this->assertSessionHasErrors('name');
    }

    /** @test */
    public function validate_traditional_music_instrument_description_update_is_not_more_than_255_characters()
    {
        $this->loginAsUser();
        $traditional_music_instrument = factory(TraditionalMusicInstrument::class)->create(['name' => 'Testing 123']);

        // description 256 characters
        $this->patch(route('traditional_music_instruments.update', $traditional_music_instrument), $this->getEditFields([
            'description' => str_repeat('Long description', 16),
        ]));
        $this->assertSessionHasErrors('description');
    }

    /** @test */
    public function user_can_delete_a_traditional_music_instrument()
    {
        $this->loginAsUser();
        $traditionalMusicInstrument = factory(TraditionalMusicInstrument::class)->create();
        factory(TraditionalMusicInstrument::class)->create();

        $this->visitRoute('traditional_music_instruments.edit', $traditionalMusicInstrument);
        $this->click('del-traditional_music_instrument-'.$traditionalMusicInstrument->id);
        $this->seeRouteIs('traditional_music_instruments.edit', [$traditionalMusicInstrument, 'action' => 'delete']);

        $this->press(__('app.delete_confirm_button'));

        $this->dontSeeInDatabase('traditional_music_instruments', [
            'id' => $traditionalMusicInstrument->id,
        ]);
    }
}
