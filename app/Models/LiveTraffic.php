<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class LiveTraffic extends Model
{
    public function tracks(): HasMany
    {
        return $this->hasMany(LiveTrafficTrack::class);
    }
}