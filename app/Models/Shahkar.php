<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shahkar extends ServiceModel
{
    use HasUuids;

    protected $guarded = [];

    protected $casts = [
        'is_match' => 'boolean',
    ];
}
