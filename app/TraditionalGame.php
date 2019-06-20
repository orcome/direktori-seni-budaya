<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class TraditionalGame extends Model
{
    protected $fillable = ['name', 'tools', 'detail', 'description', 'creator_id'];

    public function getNameLinkAttribute()
    {
        $title = __('app.show_detail_title', [
            'name' => $this->name, 'type' => __('traditional_game.traditional_game'),
        ]);
        $link = '<a href="'.route('traditional_games.show', $this).'"';
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
