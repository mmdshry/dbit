<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class IdInformationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'national_id'           => $this['national_id'],
            'birthday'              => $this['birthday'],
            'first_name'            => $this['first_name'],
            'last_name'             => $this['last_name'],
            'father_name'           => $this['father_name'],
            'gender'                => $this['gender'],
            'live_status'           => $this['live_status'],
            'identification_number' => $this['identification_number'],
            'identification_serial' => $this['identification_serial'],
            'identification_series' => $this['identification_series'],
            'office_name'           => $this['office_name'],
        ];
    }
}
