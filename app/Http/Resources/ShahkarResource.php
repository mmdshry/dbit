<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ShahkarResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'national_id' => $this['national_id'],
            'mobile'      => $this['mobile'],
            'is_match'    => $this['is_match'],
        ];
    }
}
