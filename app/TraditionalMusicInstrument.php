<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class TraditionalMusicInstrument extends Model
{
    protected $fillable = ['name', 'description', 'creator_id'];

    public function getNameLinkAttribute()
    {
        $title = __('app.show_detail_title', [
            'name' => $this->name, 'type' => __('traditional_music_instrument.traditional_music_instrument'),
        ]);
        $link = '<a href="'.route('traditional_music_instruments.show', $this).'"';
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
