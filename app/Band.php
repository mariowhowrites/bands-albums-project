<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Band extends Model
{
    protected $guarded = [];

    protected $appends = ['routes'];

    public function albums()
    {
        return $this->hasMany(Album::class);
    }

    public function getFormattedStartDate()
    {
        return Carbon::create($this->start_date)->format('d M Y');
    }

    public function getFormattedActiveStatus()
    {
        return $this->still_active ? "Active" : "Retired";
    }

    public function getRoutesAttribute()
    {
        return [
            'edit' => route('band.edit', ['band' => $this]),
            'delete' => route('band.delete', ['band' => $this]),
        ];
    }
}
