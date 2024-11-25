<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Chapter extends Model
{
    protected $fillable = ['title'];

    public function content(): MorphTo
    {
        return $this->morphTo();
    }
}