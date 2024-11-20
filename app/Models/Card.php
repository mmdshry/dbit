<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Card extends ServiceModel
{
    use HasUuids;

    protected $guarded = [];

}
