<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\TraditionalCeremony;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ManageTraditionalCeremonyTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_see_traditional_ceremony_list_in_traditional_ceremony_index_page()
    {
        $traditionalCeremony = factory(TraditionalCeremony::class)->create();

        $this->loginAsUser();
        $this->visitRoute('traditional_ceremonies.index');
        $this->see($traditionalCeremony->name);
    }

    private function getCreateFields(array $overrides = [])
    {
        return array_merge([
            'name'        => 'Manjuluk Duit',
            'detail'      => 'Kumbang auh untuk orang tua perempuan',
            'description' => 'TraditionalCeremony 1 description',
        ], $overrides);
    }

    /** @test */
    public function user_can_create_a_traditional_ceremony()
    {
        $this->loginAsUser();
        $this->visitRoute('traditional_ceremonies.index');

        $this->click(__('traditional_ceremony.create'));
        $this->seeRouteIs('traditional_ceremonies.create');

        $this->submitForm(__('traditional_ceremony.create'), $this->getCreateFields());

        $this->seeRouteIs('traditional_ceremonies.show', TraditionalCeremony::first());

        $this->seeText(__('traditional_ceremony.created'));

        $this->seeInDatabase('traditional_ceremonies', $this->getCreateFields());
    }

    /** @test */
    public function validate_traditional_ceremony_name_is_required()
    {
        $this->loginAsUser();

        // name empty
        $this->post(route('traditional_ceremonies.store'), $this->getCreateFields(['name' => '']));
        $this->assertSessionHasErrors('name');
    }

    /** @test */
    public function validate_traditional_ceremony_name_is_not_more_than_60_characters()
    {
        $this->loginAsUser();

        // name 70 characters
        $this->post(route('traditional_ceremonies.store'), $this->getCreateFields([
            'name' => str_repeat('Test Title', 7),
        ]));
        $this->assertSessionHasErrors('name');
    }

    /** @test */
    public function validate_traditional_ceremony_description_is_not_more_than_255_characters()
    {
        $this->loginAsUser();

        // description 256 characters
        $this->post(route('traditional_ceremonies.store'), $this->getCreateFields([
            'description' => str_repeat('Long description', 16),
        ]));
        $this->assertSessionHasErrors('description');
    }

    private function getEditFields(array $overrides = [])
    {
        return array_merge([
            'name'        => 'Acara mamanggul',
            'detail'      => 'Membuat surat persetujuan ikatan (meminang)',
            'description' => 'TraditionalCeremony 1 description',
        ], $overrides);
    }

    /** @test */
    public function user_can_edit_a_traditional_ceremony()
    {
        $this->loginAsUser();
        $traditionalCeremony = factory(TraditionalCeremony::class)->create(['name' => 'Testing 123']);

        $this->visitRoute('traditional_ceremonies.show', $traditionalCeremony);
        $this->click('edit-traditional_ceremony-'.$traditionalCeremony->id);
        $this->seeRouteIs('traditional_ceremonies.edit', $traditionalCeremony);

        $this->submitForm(__('traditional_ceremony.update'), $this->getEditFields());

        $this->seeRouteIs('traditional_ceremonies.show', $traditionalCeremony);

        $this->seeText(__('traditional_ceremony.updated'));

        $this->seeInDatabase('traditional_ceremonies', $this->getEditFields([
            'id' => $traditionalCeremony->id,
        ]));
    }

    /** @test */
    public function validate_traditional_ceremony_name_update_is_required()
    {
        $this->loginAsUser();
        $traditional_ceremony = factory(TraditionalCeremony::class)->create(['name' => 'Testing 123']);

        // name empty
        $this->patch(route('traditional_ceremonies.update', $traditional_ceremony), $this->getEditFields(['name' => '']));
        $this->assertSessionHasErrors('name');
    }

    /** @test */
    public function validate_traditional_ceremony_name_update_is_not_more_than_60_characters()
    {
        $this->loginAsUser();
        $traditional_ceremony = factory(TraditionalCeremony::class)->create(['name' => 'Testing 123']);

        // name 70 characters
        $this->patch(route('traditional_ceremonies.update', $traditional_ceremony), $this->getEditFields([
            'name' => str_repeat('Test Title', 7),
        ]));
        $this->assertSessionHasErrors('name');
    }

    /** @test */
    public function validate_traditional_ceremony_description_update_is_not_more_than_255_characters()
    {
        $this->loginAsUser();
        $traditional_ceremony = factory(TraditionalCeremony::class)->create(['name' => 'Testing 123']);

        // description 256 characters
        $this->patch(route('traditional_ceremonies.update', $traditional_ceremony), $this->getEditFields([
            'description' => str_repeat('Long description', 16),
        ]));
        $this->assertSessionHasErrors('description');
    }

    /** @test */
    public function user_can_delete_a_traditional_ceremony()
    {
        $this->loginAsUser();
        $traditionalCeremony = factory(TraditionalCeremony::class)->create();
        factory(TraditionalCeremony::class)->create();

        $this->visitRoute('traditional_ceremonies.edit', $traditionalCeremony);
        $this->click('del-traditional_ceremony-'.$traditionalCeremony->id);
        $this->seeRouteIs('traditional_ceremonies.edit', [$traditionalCeremony, 'action' => 'delete']);

        $this->press(__('app.delete_confirm_button'));

        $this->seeText(__('traditional_ceremony.deleted'));

        $this->dontSeeInDatabase('traditional_ceremonies', [
            'id' => $traditionalCeremony->id,
        ]);
    }
}
