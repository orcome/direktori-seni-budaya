<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class TraditionalCeremony extends Model
{
    protected $fillable = ['name', 'detail', 'description', 'creator_id'];

    public function getNameLinkAttribute()
    {
        $title = __('app.show_detail_title', [
            'name' => $this->name, 'type' => __('traditional_ceremony.traditional_ceremony'),
        ]);
        $link = '<a href="'.route('traditional_ceremonies.show', $this).'"';
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
