<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\NaturalArtificialTourism;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ManageNaturalArtificialTourismTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_see_natural_artificial_tourism_list_in_natural_artificial_tourism_index_page()
    {
        $naturalArtificialTourism = factory(NaturalArtificialTourism::class)->create();

        $this->loginAsUser();
        $this->visitRoute('natural_artificial_tourisms.index');
        $this->see($naturalArtificialTourism->name);
    }

    private function getCreateFields(array $overrides = [])
    {
        return array_merge([
            'name'        => 'Pulau Telo',
            'category'    => 0,
            'location'    => 'Selat',
            'description' => 'NaturalArtificialTourism 1 description',
        ], $overrides);
    }

    /** @test */
    public function user_can_create_a_natural_artificial_tourism()
    {
        $this->loginAsUser();
        $this->visitRoute('natural_artificial_tourisms.index');

        $this->click(__('natural_artificial_tourism.create'));
        $this->seeRouteIs('natural_artificial_tourisms.create');

        $this->submitForm(__('natural_artificial_tourism.create'), $this->getCreateFields());

        $this->seeRouteIs('natural_artificial_tourisms.show', NaturalArtificialTourism::first());

        $this->seeInDatabase('natural_artificial_tourisms', $this->getCreateFields());
    }

    /** @test */
    public function validate_natural_artificial_tourism_name_is_required()
    {
        $this->loginAsUser();

        // name empty
        $this->post(route('natural_artificial_tourisms.store'), $this->getCreateFields(['name' => '']));
        $this->assertSessionHasErrors('name');
    }

    /** @test */
    public function validate_natural_artificial_tourism_name_is_not_more_than_60_characters()
    {
        $this->loginAsUser();

        // name 70 characters
        $this->post(route('natural_artificial_tourisms.store'), $this->getCreateFields([
            'name' => str_repeat('Test Title', 7),
        ]));
        $this->assertSessionHasErrors('name');
    }

    /** @test */
    public function validate_natural_artificial_tourism_description_is_not_more_than_255_characters()
    {
        $this->loginAsUser();

        // description 256 characters
        $this->post(route('natural_artificial_tourisms.store'), $this->getCreateFields([
            'description' => str_repeat('Long description', 16),
        ]));
        $this->assertSessionHasErrors('description');
    }

    private function getEditFields(array $overrides = [])
    {
        return array_merge([
            'name'        => 'Pulau Telo',
            'category'    => 0,
            'location'    => 'Selat',
            'description' => 'NaturalArtificialTourism 1 description',
        ], $overrides);
    }

    /** @test */
    public function user_can_edit_a_natural_artificial_tourism()
    {
        $this->loginAsUser();
        $naturalArtificialTourism = factory(NaturalArtificialTourism::class)->create(['name' => 'Testing 123']);

        $this->visitRoute('natural_artificial_tourisms.show', $naturalArtificialTourism);
        $this->click('edit-natural_artificial_tourism-'.$naturalArtificialTourism->id);
        $this->seeRouteIs('natural_artificial_tourisms.edit', $naturalArtificialTourism);

        $this->submitForm(__('natural_artificial_tourism.update'), $this->getEditFields());

        $this->seeRouteIs('natural_artificial_tourisms.show', $naturalArtificialTourism);

        $this->seeInDatabase('natural_artificial_tourisms', $this->getEditFields([
            'id' => $naturalArtificialTourism->id,
        ]));
    }

    /** @test */
    public function validate_natural_artificial_tourism_name_update_is_required()
    {
        $this->loginAsUser();
        $natural_artificial_tourism = factory(NaturalArtificialTourism::class)->create(['name' => 'Testing 123']);

        // name empty
        $this->patch(route('natural_artificial_tourisms.update', $natural_artificial_tourism), $this->getEditFields(['name' => '']));
        $this->assertSessionHasErrors('name');
    }

    /** @test */
    public function validate_natural_artificial_tourism_name_update_is_not_more_than_60_characters()
    {
        $this->loginAsUser();
        $natural_artificial_tourism = factory(NaturalArtificialTourism::class)->create(['name' => 'Testing 123']);

        // name 70 characters
        $this->patch(route('natural_artificial_tourisms.update', $natural_artificial_tourism), $this->getEditFields([
            'name' => str_repeat('Test Title', 7),
        ]));
        $this->assertSessionHasErrors('name');
    }

    /** @test */
    public function validate_natural_artificial_tourism_description_update_is_not_more_than_255_characters()
    {
        $this->loginAsUser();
        $natural_artificial_tourism = factory(NaturalArtificialTourism::class)->create(['name' => 'Testing 123']);

        // description 256 characters
        $this->patch(route('natural_artificial_tourisms.update', $natural_artificial_tourism), $this->getEditFields([
            'description' => str_repeat('Long description', 16),
        ]));
        $this->assertSessionHasErrors('description');
    }

    /** @test */
    public function user_can_delete_a_natural_artificial_tourism()
    {
        $this->loginAsUser();
        $naturalArtificialTourism = factory(NaturalArtificialTourism::class)->create();
        factory(NaturalArtificialTourism::class)->create();

        $this->visitRoute('natural_artificial_tourisms.edit', $naturalArtificialTourism);
        $this->click('del-natural_artificial_tourism-'.$naturalArtificialTourism->id);
        $this->seeRouteIs('natural_artificial_tourisms.edit', [$naturalArtificialTourism, 'action' => 'delete']);

        $this->press(__('app.delete_confirm_button'));

        $this->dontSeeInDatabase('natural_artificial_tourisms', [
            'id' => $naturalArtificialTourism->id,
        ]);
    }
}
