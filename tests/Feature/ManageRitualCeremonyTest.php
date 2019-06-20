<?php

namespace Tests\Feature;

use App\RitualCeremony;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ManageRitualCeremonyTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_see_ritual_ceremony_list_in_ritual_ceremony_index_page()
    {
        $ritualCeremony = factory(RitualCeremony::class)->create();

        $this->loginAsUser();
        $this->visitRoute('ritual_ceremonies.index');
        $this->see($ritualCeremony->name);
    }

    private function getCreateFields(array $overrides = [])
    {
        return array_merge([
            'name'        => 'RitualCeremony 1 name',
            'description' => 'RitualCeremony 1 description',
        ], $overrides);
    }

    /** @test */
    public function user_can_create_a_ritual_ceremony()
    {
        $this->loginAsUser();
        $this->visitRoute('ritual_ceremonies.index');

        $this->click(__('ritual_ceremony.create'));
        $this->seeRouteIs('ritual_ceremonies.create');

        $this->submitForm(__('ritual_ceremony.create'), $this->getCreateFields());

        $this->seeRouteIs('ritual_ceremonies.show', RitualCeremony::first());

        $this->seeInDatabase('ritual_ceremonies', $this->getCreateFields());
    }

    /** @test */
    public function validate_ritual_ceremony_name_is_required()
    {
        $this->loginAsUser();

        // name empty
        $this->post(route('ritual_ceremonies.store'), $this->getCreateFields(['name' => '']));
        $this->assertSessionHasErrors('name');
    }

    /** @test */
    public function validate_ritual_ceremony_name_is_not_more_than_60_characters()
    {
        $this->loginAsUser();

        // name 70 characters
        $this->post(route('ritual_ceremonies.store'), $this->getCreateFields([
            'name' => str_repeat('Test Title', 7),
        ]));
        $this->assertSessionHasErrors('name');
    }

    /** @test */
    public function validate_ritual_ceremony_description_is_not_more_than_255_characters()
    {
        $this->loginAsUser();

        // description 256 characters
        $this->post(route('ritual_ceremonies.store'), $this->getCreateFields([
            'description' => str_repeat('Long description', 16),
        ]));
        $this->assertSessionHasErrors('description');
    }

    private function getEditFields(array $overrides = [])
    {
        return array_merge([
            'name'        => 'RitualCeremony 1 name',
            'description' => 'RitualCeremony 1 description',
        ], $overrides);
    }

    /** @test */
    public function user_can_edit_a_ritual_ceremony()
    {
        $this->loginAsUser();
        $ritualCeremony = factory(RitualCeremony::class)->create(['name' => 'Testing 123']);

        $this->visitRoute('ritual_ceremonies.show', $ritualCeremony);
        $this->click('edit-ritual_ceremony-'.$ritualCeremony->id);
        $this->seeRouteIs('ritual_ceremonies.edit', $ritualCeremony);

        $this->submitForm(__('ritual_ceremony.update'), $this->getEditFields());

        $this->seeRouteIs('ritual_ceremonies.show', $ritualCeremony);

        $this->seeInDatabase('ritual_ceremonies', $this->getEditFields([
            'id' => $ritualCeremony->id,
        ]));
    }

    /** @test */
    public function validate_ritual_ceremony_name_update_is_required()
    {
        $this->loginAsUser();
        $ritual_ceremony = factory(RitualCeremony::class)->create(['name' => 'Testing 123']);

        // name empty
        $this->patch(route('ritual_ceremonies.update', $ritual_ceremony), $this->getEditFields(['name' => '']));
        $this->assertSessionHasErrors('name');
    }

    /** @test */
    public function validate_ritual_ceremony_name_update_is_not_more_than_60_characters()
    {
        $this->loginAsUser();
        $ritual_ceremony = factory(RitualCeremony::class)->create(['name' => 'Testing 123']);

        // name 70 characters
        $this->patch(route('ritual_ceremonies.update', $ritual_ceremony), $this->getEditFields([
            'name' => str_repeat('Test Title', 7),
        ]));
        $this->assertSessionHasErrors('name');
    }

    /** @test */
    public function validate_ritual_ceremony_description_update_is_not_more_than_255_characters()
    {
        $this->loginAsUser();
        $ritual_ceremony = factory(RitualCeremony::class)->create(['name' => 'Testing 123']);

        // description 256 characters
        $this->patch(route('ritual_ceremonies.update', $ritual_ceremony), $this->getEditFields([
            'description' => str_repeat('Long description', 16),
        ]));
        $this->assertSessionHasErrors('description');
    }

    /** @test */
    public function user_can_delete_a_ritual_ceremony()
    {
        $this->loginAsUser();
        $ritualCeremony = factory(RitualCeremony::class)->create();
        factory(RitualCeremony::class)->create();

        $this->visitRoute('ritual_ceremonies.edit', $ritualCeremony);
        $this->click('del-ritual_ceremony-'.$ritualCeremony->id);
        $this->seeRouteIs('ritual_ceremonies.edit', [$ritualCeremony, 'action' => 'delete']);

        $this->press(__('app.delete_confirm_button'));

        $this->dontSeeInDatabase('ritual_ceremonies', [
            'id' => $ritualCeremony->id,
        ]);
    }
}
