<?php

namespace Tests\Feature;

use App\SubDistrict;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ManageSubDistrictTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_see_sub_district_list_in_sub_district_index_page()
    {
        $subDistrict = factory(SubDistrict::class)->create();

        $this->loginAsUser();
        $this->visitRoute('sub_districts.index');
        $this->see($subDistrict->name);
    }

    /** @test */
    public function user_can_create_a_sub_district()
    {
        $this->loginAsUser();
        $this->visitRoute('sub_districts.index');

        $this->click(__('sub_district.create'));
        $this->seeRouteIs('sub_districts.index', ['action' => 'create']);

        $this->submitForm(__('sub_district.create'), [
            'name'        => 'SubDistrict 1 name',
            'description' => 'SubDistrict 1 description',
        ]);

        $this->seeRouteIs('sub_districts.index');

        $this->seeInDatabase('sub_districts', [
            'name'        => 'SubDistrict 1 name',
            'description' => 'SubDistrict 1 description',
        ]);
    }

    private function getCreateFields(array $overrides = [])
    {
        return array_merge([
            'name'        => 'SubDistrict 1 name',
            'description' => 'SubDistrict 1 description',
        ], $overrides);
    }

    /** @test */
    public function validate_sub_district_name_is_required()
    {
        $this->loginAsUser();

        // name empty
        $this->post(route('sub_districts.store'), $this->getCreateFields(['name' => '']));
        $this->assertSessionHasErrors('name');
    }

    /** @test */
    public function validate_sub_district_name_is_not_more_than_60_characters()
    {
        $this->loginAsUser();

        // name 70 characters
        $this->post(route('sub_districts.store'), $this->getCreateFields([
            'name' => str_repeat('Test Title', 7),
        ]));
        $this->assertSessionHasErrors('name');
    }

    /** @test */
    public function validate_sub_district_description_is_not_more_than_255_characters()
    {
        $this->loginAsUser();

        // description 256 characters
        $this->post(route('sub_districts.store'), $this->getCreateFields([
            'description' => str_repeat('Long description', 16),
        ]));
        $this->assertSessionHasErrors('description');
    }

    /** @test */
    public function user_can_edit_a_sub_district_within_search_query()
    {
        $this->loginAsUser();
        $subDistrict = factory(SubDistrict::class)->create(['name' => 'Testing 123']);

        $this->visitRoute('sub_districts.index', ['q' => '123']);
        $this->click('edit-sub_district-'.$subDistrict->id);
        $this->seeRouteIs('sub_districts.index', ['action' => 'edit', 'id' => $subDistrict->id, 'q' => '123']);

        $this->submitForm(__('sub_district.update'), [
            'name'        => 'SubDistrict 1 name',
            'description' => 'SubDistrict 1 description',
        ]);

        $this->seeRouteIs('sub_districts.index', ['q' => '123']);

        $this->seeInDatabase('sub_districts', [
            'name'        => 'SubDistrict 1 name',
            'description' => 'SubDistrict 1 description',
        ]);
    }

    private function getEditFields(array $overrides = [])
    {
        return array_merge([
            'name'        => 'SubDistrict 1 name',
            'description' => 'SubDistrict 1 description',
        ], $overrides);
    }

    /** @test */
    public function validate_sub_district_name_update_is_required()
    {
        $this->loginAsUser();
        $sub_district = factory(SubDistrict::class)->create(['name' => 'Testing 123']);

        // name empty
        $this->patch(route('sub_districts.update', $sub_district), $this->getEditFields(['name' => '']));
        $this->assertSessionHasErrors('name');
    }

    /** @test */
    public function validate_sub_district_name_update_is_not_more_than_60_characters()
    {
        $this->loginAsUser();
        $sub_district = factory(SubDistrict::class)->create(['name' => 'Testing 123']);

        // name 70 characters
        $this->patch(route('sub_districts.update', $sub_district), $this->getEditFields([
            'name' => str_repeat('Test Title', 7),
        ]));
        $this->assertSessionHasErrors('name');
    }

    /** @test */
    public function validate_sub_district_description_update_is_not_more_than_255_characters()
    {
        $this->loginAsUser();
        $sub_district = factory(SubDistrict::class)->create(['name' => 'Testing 123']);

        // description 256 characters
        $this->patch(route('sub_districts.update', $sub_district), $this->getEditFields([
            'description' => str_repeat('Long description', 16),
        ]));
        $this->assertSessionHasErrors('description');
    }

    /** @test */
    public function user_can_delete_a_sub_district()
    {
        $this->loginAsUser();
        $subDistrict = factory(SubDistrict::class)->create();
        factory(SubDistrict::class)->create();

        $this->visitRoute('sub_districts.index', ['action' => 'edit', 'id' => $subDistrict->id]);
        $this->click('del-sub_district-'.$subDistrict->id);
        $this->seeRouteIs('sub_districts.index', ['action' => 'delete', 'id' => $subDistrict->id]);

        $this->seeInDatabase('sub_districts', [
            'id' => $subDistrict->id,
        ]);

        $this->press(__('app.delete_confirm_button'));

        $this->dontSeeInDatabase('sub_districts', [
            'id' => $subDistrict->id,
        ]);
    }
}
