<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class ArtStudio extends Model
{
    protected $fillable = ['name', 'sub_district', 'village',
        'leader', 'art_type', 'building', 'description', 'creator_id'];

    public function getNameLinkAttribute()
    {
        $title = __('app.show_detail_title', [
            'name' => $this->name, 'type' => __('art_studio.art_studio'),
        ]);
        $link = '<a href="'.route('art_studios.show', $this).'"';
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