<?php

namespace App;

use App\User;
use App\SubDistrict;
use Illuminate\Database\Eloquent\Model;

class CulturalHeritage extends Model
{
    protected $fillable = ['name', 'type', 'sub_district_id', 'village', 'description', 'creator_id'];

    public function getNameLinkAttribute()
    {
        $title = __('app.show_detail_title', [
            'name' => $this->name, 'type' => __('cultural_heritage.cultural_heritage'),
        ]);
        $link = '<a href="'.route('cultural_heritages.show', $this).'"';
        $link .= ' title="'.$title.'">';
        $link .= $this->name;
        $link .= '</a>';

        return $link;
    }

    public function creator()
    {
        return $this->belongsTo(User::class);
    }

    public function subDistrict()
    {
        return $this->belongsTo(SubDistrict::class);
    }
}
