<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $guarded = [];

    protected $appends = ['routes'];

    protected $with = ['band'];

    public function band()
    {
        return $this->belongsTo(Band::class);
    }

    public function getFormattedReleaseDate()
    {
        return Carbon::create($this->release_date)->format('j F, Y');
    }

    public function getFormattedRecordedDate()
    {
        return Carbon::create($this->recorded_date)->format('j F, Y');
    }

    public function getRoutesAttribute()
    {
        return [
            'edit' => route('album.edit', ['album' => $this]),
            'delete' => route('album.delete', ['album' => $this]),
        ];
    }
}
