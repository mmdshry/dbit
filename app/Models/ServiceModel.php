<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class ServiceModel extends Model
{
    public function logs(): MorphMany
    {
        return $this->morphMany(Log::class, 'loggable');
    }
}
