<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\TraditionalGame;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ManageTraditionalGameTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_see_traditional_game_list_in_traditional_game_index_page()
    {
        $traditionalGame = factory(TraditionalGame::class)->create();

        $this->loginAsUser();
        $this->visitRoute('traditional_games.index');
        $this->see($traditionalGame->name);
    }

    private function getCreateFields(array $overrides = [])
    {
        return array_merge([
            'name'        => 'Balogo',
            'tools'       => 'Tempurung kelapa',
            'detail'      => 'Permainan yang dimainkan pada umumnya oleh putra secara perorangan atau beregu bisa dimainkan mulai dari anak-anak sampai remaja',
            'description' => 'TraditionalGame 1 description',
        ], $overrides);
    }

    /** @test */
    public function user_can_create_a_traditional_game()
    {
        $this->loginAsUser();
        $this->visitRoute('traditional_games.index');

        $this->click(__('traditional_game.create'));
        $this->seeRouteIs('traditional_games.create');

        $this->submitForm(__('traditional_game.create'), $this->getCreateFields());

        $this->seeRouteIs('traditional_games.show', TraditionalGame::first());

        $this->seeText(__('traditional_game.created'));

        $this->seeInDatabase('traditional_games', $this->getCreateFields());
    }

    /** @test */
    public function validate_traditional_game_name_is_required()
    {
        $this->loginAsUser();

        // name empty
        $this->post(route('traditional_games.store'), $this->getCreateFields(['name' => '']));
        $this->assertSessionHasErrors('name');
    }

    /** @test */
    public function validate_traditional_game_name_is_not_more_than_60_characters()
    {
        $this->loginAsUser();

        // name 70 characters
        $this->post(route('traditional_games.store'), $this->getCreateFields([
            'name' => str_repeat('Test Title', 7),
        ]));
        $this->assertSessionHasErrors('name');
    }

    /** @test */
    public function validate_traditional_game_description_is_not_more_than_255_characters()
    {
        $this->loginAsUser();

        // description 256 characters
        $this->post(route('traditional_games.store'), $this->getCreateFields([
            'description' => str_repeat('Long description', 16),
        ]));
        $this->assertSessionHasErrors('description');
    }

    private function getEditFields(array $overrides = [])
    {
        return array_merge([
            'name'        => 'Habayang (Bagasing)',
            'tools'       => 'Tempurung kelapa',
            'detail'      => 'Permainan yang dimainkan pada umumnya oleh putra secara perorangan atau beregu bisa dimainkan mulai dari anak-anak sampai remaja',
            'description' => 'TraditionalGame 1 description',
        ], $overrides);
    }

    /** @test */
    public function user_can_edit_a_traditional_game()
    {
        $this->loginAsUser();
        $traditionalGame = factory(TraditionalGame::class)->create(['name' => 'Testing 123']);

        $this->visitRoute('traditional_games.show', $traditionalGame);
        $this->click('edit-traditional_game-'.$traditionalGame->id);
        $this->seeRouteIs('traditional_games.edit', $traditionalGame);

        $this->submitForm(__('traditional_game.update'), $this->getEditFields());

        $this->seeRouteIs('traditional_games.show', $traditionalGame);

        $this->seeText(__('traditional_game.updated'));

        $this->seeInDatabase('traditional_games', $this->getEditFields([
            'id' => $traditionalGame->id,
        ]));
    }

    /** @test */
    public function validate_traditional_game_name_update_is_required()
    {
        $this->loginAsUser();
        $traditional_game = factory(TraditionalGame::class)->create(['name' => 'Testing 123']);

        // name empty
        $this->patch(route('traditional_games.update', $traditional_game), $this->getEditFields(['name' => '']));
        $this->assertSessionHasErrors('name');
    }

    /** @test */
    public function validate_traditional_game_name_update_is_not_more_than_60_characters()
    {
        $this->loginAsUser();
        $traditional_game = factory(TraditionalGame::class)->create(['name' => 'Testing 123']);

        // name 70 characters
        $this->patch(route('traditional_games.update', $traditional_game), $this->getEditFields([
            'name' => str_repeat('Test Title', 7),
        ]));
        $this->assertSessionHasErrors('name');
    }

    /** @test */
    public function validate_traditional_game_description_update_is_not_more_than_255_characters()
    {
        $this->loginAsUser();
        $traditional_game = factory(TraditionalGame::class)->create(['name' => 'Testing 123']);

        // description 256 characters
        $this->patch(route('traditional_games.update', $traditional_game), $this->getEditFields([
            'description' => str_repeat('Long description', 16),
        ]));
        $this->assertSessionHasErrors('description');
    }

    /** @test */
    public function user_can_delete_a_traditional_game()
    {
        $this->loginAsUser();
        $traditionalGame = factory(TraditionalGame::class)->create();
        factory(TraditionalGame::class)->create();

        $this->visitRoute('traditional_games.edit', $traditionalGame);
        $this->click('del-traditional_game-'.$traditionalGame->id);
        $this->seeRouteIs('traditional_games.edit', [$traditionalGame, 'action' => 'delete']);

        $this->press(__('app.delete_confirm_button'));

        $this->seeText(__('traditional_game.deleted'));

        $this->dontSeeInDatabase('traditional_games', [
            'id' => $traditionalGame->id,
        ]);
    }
}
