<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LiveTrafficTrack extends Model
{
    protected $fillable = ['transcript'];

    public function liveTraffic(): BelongsTo
    {
        return $this->belongsTo(LiveTraffic::class);
    }
}