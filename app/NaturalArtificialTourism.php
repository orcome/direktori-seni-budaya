<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class NaturalArtificialTourism extends Model
{
    protected $fillable = ['name', 'category', 'location', 'description', 'creator_id'];

    public function getNameLinkAttribute()
    {
        $title = __('app.show_detail_title', [
            'name' => $this->name, 'type' => __('natural_artificial_tourism.natural_artificial_tourism'),
        ]);
        $link = '<a href="'.route('natural_artificial_tourisms.show', $this).'"';
        $link .= ' title="'.$title.'">';
        $link .= $this->name;
        $link .= '</a>';

        return $link;
    }

    public function creator()
    {
        return $this->belongsTo(User::class);
    }
}
