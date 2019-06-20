<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\TraditionalDance;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ManageTraditionalDanceTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_see_traditional_dance_list_in_traditional_dance_index_page()
    {
        $traditionalDance = factory(TraditionalDance::class)->create();

        $this->loginAsUser();
        $this->visitRoute('traditional_dances.index');
        $this->see($traditionalDance->name);
    }

    private function getCreateFields(array $overrides = [])
    {
        return array_merge([
            'name'          => 'TraditionalDance 1 name',
            'dance_type'    => 'TraditionalDance 1 name',
            'choreographer' => 'TraditionalDance 1 name',
            'description'   => 'TraditionalDance 1 description',
        ], $overrides);
    }

    /** @test */
    public function user_can_create_a_traditional_dance()
    {
        $this->loginAsUser();
        $this->visitRoute('traditional_dances.index');

        $this->click(__('traditional_dance.create'));
        $this->seeRouteIs('traditional_dances.create');

        $this->submitForm(__('traditional_dance.create'), $this->getCreateFields());

        $this->seeRouteIs('traditional_dances.show', TraditionalDance::first());

        $this->seeInDatabase('traditional_dances', $this->getCreateFields());
    }

    /** @test */
    public function validate_traditional_dance_name_is_required()
    {
        $this->loginAsUser();

        // name empty
        $this->post(route('traditional_dances.store'), $this->getCreateFields(['name' => '']));
        $this->assertSessionHasErrors('name');
    }

    /** @test */
    public function validate_traditional_dance_name_is_not_more_than_60_characters()
    {
        $this->loginAsUser();

        // name 70 characters
        $this->post(route('traditional_dances.store'), $this->getCreateFields([
            'name' => str_repeat('Test Title', 7),
        ]));
        $this->assertSessionHasErrors('name');
    }

    /** @test */
    public function validate_traditional_dance_description_is_not_more_than_255_characters()
    {
        $this->loginAsUser();

        // description 256 characters
        $this->post(route('traditional_dances.store'), $this->getCreateFields([
            'description' => str_repeat('Long description', 16),
        ]));
        $this->assertSessionHasErrors('description');
    }

    private function getEditFields(array $overrides = [])
    {
        return array_merge([
            'name'        => 'TraditionalDance 1 name',
            'description' => 'TraditionalDance 1 description',
        ], $overrides);
    }

    /** @test */
    public function user_can_edit_a_traditional_dance()
    {
        $this->loginAsUser();
        $traditionalDance = factory(TraditionalDance::class)->create(['name' => 'Testing 123']);

        $this->visitRoute('traditional_dances.show', $traditionalDance);
        $this->click('edit-traditional_dance-'.$traditionalDance->id);
        $this->seeRouteIs('traditional_dances.edit', $traditionalDance);

        $this->submitForm(__('traditional_dance.update'), $this->getEditFields());

        $this->seeRouteIs('traditional_dances.show', $traditionalDance);

        $this->seeInDatabase('traditional_dances', $this->getEditFields([
            'id' => $traditionalDance->id,
        ]));
    }

    /** @test */
    public function validate_traditional_dance_name_update_is_required()
    {
        $this->loginAsUser();
        $traditional_dance = factory(TraditionalDance::class)->create(['name' => 'Testing 123']);

        // name empty
        $this->patch(route('traditional_dances.update', $traditional_dance), $this->getEditFields(['name' => '']));
        $this->assertSessionHasErrors('name');
    }

    /** @test */
    public function validate_traditional_dance_name_update_is_not_more_than_60_characters()
    {
        $this->loginAsUser();
        $traditional_dance = factory(TraditionalDance::class)->create(['name' => 'Testing 123']);

        // name 70 characters
        $this->patch(route('traditional_dances.update', $traditional_dance), $this->getEditFields([
            'name' => str_repeat('Test Title', 7),
        ]));
        $this->assertSessionHasErrors('name');
    }

    /** @test */
    public function validate_traditional_dance_description_update_is_not_more_than_255_characters()
    {
        $this->loginAsUser();
        $traditional_dance = factory(TraditionalDance::class)->create(['name' => 'Testing 123']);

        // description 256 characters
        $this->patch(route('traditional_dances.update', $traditional_dance), $this->getEditFields([
            'description' => str_repeat('Long description', 16),
        ]));
        $this->assertSessionHasErrors('description');
    }

    /** @test */
    public function user_can_delete_a_traditional_dance()
    {
        $this->loginAsUser();
        $traditionalDance = factory(TraditionalDance::class)->create();
        factory(TraditionalDance::class)->create();

        $this->visitRoute('traditional_dances.edit', $traditionalDance);
        $this->click('del-traditional_dance-'.$traditionalDance->id);
        $this->seeRouteIs('traditional_dances.edit', [$traditionalDance, 'action' => 'delete']);

        $this->press(__('app.delete_confirm_button'));

        $this->dontSeeInDatabase('traditional_dances', [
            'id' => $traditionalDance->id,
        ]);
    }
}
