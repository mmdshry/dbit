<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;

class IdImage extends ServiceModel
{
    use HasUuids;

    protected $guarded = [];

    protected function casts(): array
    {
        return [
            'image' => 'encrypted'
        ];
    }
}
