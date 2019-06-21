<?php

namespace Tests\Unit\Models;

use App\User;
use Tests\TestCase;
use App\SubDistrict;
use App\CulturalHeritage;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CulturalHeritageTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_cultural_heritage_has_name_link_attribute()
    {
        $subDistrict = factory(SubDistrict::class)->create();
        $culturalHeritage = factory(CulturalHeritage::class)->create([
            'sub_district_id' => $subDistrict->id,
        ]);

        $title = __('app.show_detail_title', [
            'name' => $culturalHeritage->name, 'type' => __('cultural_heritage.cultural_heritage'),
        ]);
        $link = '<a href="'.route('cultural_heritages.show', $culturalHeritage).'"';
        $link .= ' title="'.$title.'">';
        $link .= $culturalHeritage->name;
        $link .= '</a>';

        $this->assertEquals($link, $culturalHeritage->name_link);
    }

    /** @test */
    public function a_cultural_heritage_has_belongs_to_creator_relation()
    {
        $culturalHeritage = factory(CulturalHeritage::class)->make();

        $this->assertInstanceOf(User::class, $culturalHeritage->creator);
        $this->assertEquals($culturalHeritage->creator_id, $culturalHeritage->creator->id);
    }
}
