<?php

namespace App\Http\Resources;

use App\Enums\BanksEnum;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CardResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'bank_en' => $this['bank'],
            'bank_fa' => BanksEnum::tryFromName($this['bank'])->value,
            'type' => $this['type'],
            'owner' => $this['owner'],
            'deposit_number' => $this['deposit_number'],
        ];
    }
}
