<?php

namespace Tests\Feature;

use App\ArtStudio;
use Tests\TestCase;
use App\SubDistrict;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ManageArtStudioTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_see_art_studio_list_in_art_studio_index_page()
    {
        $subDistrict = factory(SubDistrict::class)->create();
        $artStudio = factory(ArtStudio::class)->create([
            'sub_district_id' => $subDistrict->id,
        ]);

        $this->loginAsUser();
        $this->visitRoute('art_studios.index');
        $this->see($artStudio->name);
    }

    private function getCreateFields(array $overrides = [])
    {
        return array_merge([
            'name'            => 'Sanggar Tingang Menteng Panjung Tarung',
            'sub_district_id' => 1,
            'village'         => 'Selat Dalam',
            'leader'          => 'Erliansyah',
            'art_type'        => 'Sanggar Tari',
            'building'        => 0, // 0: Tidak Ada, 1: Ada
            'description'     => 'Diupayakan Pembangunan Gedungnya melalui Pemerintah Kabupaten Pemerintah Propinsi dan Pemerintah Pusat',
        ], $overrides);
    }

    /** @test */
    public function user_can_create_a_art_studio()
    {
        $this->loginAsUser();
        $subDistrict = factory(SubDistrict::class)->create();

        $this->visitRoute('art_studios.index');

        $this->click(__('art_studio.create'));
        $this->seeRouteIs('art_studios.create');

        $this->submitForm(__('art_studio.create'), $this->getCreateFields([
            'sub_district_id' => $subDistrict->id,
        ]));

        $this->seeRouteIs('art_studios.show', ArtStudio::first());

        $this->seeInDatabase('art_studios', $this->getCreateFields());
    }

    /** @test */
    public function validate_art_studio_name_is_required()
    {
        $this->loginAsUser();

        // name empty
        $this->post(route('art_studios.store'), $this->getCreateFields(['name' => '']));
        $this->assertSessionHasErrors('name');
    }

    /** @test */
    public function validate_art_studio_description_is_not_more_than_255_characters()
    {
        $this->loginAsUser();

        // description 256 characters
        $this->post(route('art_studios.store'), $this->getCreateFields([
            'description' => str_repeat('Long description', 16),
        ]));
        $this->assertSessionHasErrors('description');
    }

    private function getEditFields(array $overrides = [])
    {
        return array_merge([
            'name'            => 'Sanggar Riak Nyalong',
            'sub_district_id' => 1,
            'village'         => 'Selat Dalam',
            'leader'          => 'Ragus Rumbang',
            'art_type'        => 'Sanggar Tari',
            'building'        => 0, // 0: Tidak Ada, 1: Ada
            'description'     => 'Diupayakan Pembangunan Gedungnya melalui Pemerintah Kabupaten Pemerintah Propinsi dan Pemerintah Pusat',
        ], $overrides);
    }

    /** @test */
    public function user_can_edit_a_art_studio()
    {
        $this->loginAsUser();
        $subDistrict = factory(SubDistrict::class)->create();
        $artStudio = factory(ArtStudio::class)->create(['name' => 'Testing 123']);

        $this->visitRoute('art_studios.show', $artStudio);
        $this->click('edit-art_studio-'.$artStudio->id);
        $this->seeRouteIs('art_studios.edit', $artStudio);

        $this->submitForm(__('art_studio.update'), $this->getEditFields([
            'sub_district_id' => $subDistrict->id,
        ]));

        $this->seeRouteIs('art_studios.show', $artStudio);

        $this->seeInDatabase('art_studios', $this->getEditFields([
            'id' => $artStudio->id,
        ]));
    }

    /** @test */
    public function validate_art_studio_name_update_is_required()
    {
        $this->loginAsUser();
        $subDistrict = factory(SubDistrict::class)->create();
        $art_studio = factory(ArtStudio::class)->create([
            'name'            => 'Testing 123',
            'sub_district_id' => $subDistrict->id,
        ]);

        // name empty
        $this->patch(route('art_studios.update', $art_studio), $this->getEditFields(['name' => '']));
        $this->assertSessionHasErrors('name');
    }

    /** @test */
    public function validate_art_studio_description_update_is_not_more_than_255_characters()
    {
        $this->loginAsUser();
        $subDistrict = factory(SubDistrict::class)->create();
        $art_studio = factory(ArtStudio::class)->create([
            'name'            => 'Testing 123',
            'sub_district_id' => $subDistrict->id,
        ]);

        // description 256 characters
        $this->patch(route('art_studios.update', $art_studio), $this->getEditFields([
            'description' => str_repeat('Long description', 16),
        ]));
        $this->assertSessionHasErrors('description');
    }

    /** @test */
    public function user_can_delete_a_art_studio()
    {
        $this->loginAsUser();
        $subDistrict = factory(SubDistrict::class)->create();
        $artStudio = factory(ArtStudio::class)->create([
            'name'            => 'Testing 123',
            'sub_district_id' => $subDistrict->id,
        ]);
        factory(ArtStudio::class)->create();

        $this->visitRoute('art_studios.edit', $artStudio);
        $this->click('del-art_studio-'.$artStudio->id);
        $this->seeRouteIs('art_studios.edit', [$artStudio, 'action' => 'delete']);

        $this->press(__('app.delete_confirm_button'));

        $this->dontSeeInDatabase('art_studios', [
            'id' => $artStudio->id,
        ]);
    }
}
