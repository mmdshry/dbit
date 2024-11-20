<?php

namespace App\Services\Tls;

use App\Models\MatchCardId;
use App\Services\BaseService;

class MatchCardIdService extends BaseService
{
    public function getModelClass(): string
    {
        return MatchCardId::class;
    }

    public function transformRequest(array $data): array
    {
        return [
            'nationalCode' => $data['national_id'],
            'birthDate'    => $data['birthday'],
            'cardNumber'   => $data['card_number']
        ];
    }

    public function transformResponse(array $response, ?array $data): array
    {
        return [
            'national_id' => $data['national_id'],
            'birthday'    => $data['birthday'],
            'card_number' => $data['card_number'],
            'is_match'    => $response['isMatched'],
        ];
    }
}