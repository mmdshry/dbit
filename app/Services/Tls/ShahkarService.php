<?php

namespace App\Services\Tls;

use App\Models\Shahkar;
use App\Services\BaseService;

class ShahkarService extends BaseService
{
    public function getModelClass(): string
    {
        return Shahkar::class;
    }

    public function transformRequest(array $data): array
    {
        return [
            'nationalCode' => $data['national_id'],
            'mobileNumber' => $data['mobile'],
        ];
    }

    public function transformResponse(array $response, ?array $data): array
    {
        return [
            'national_id' => $data['national_id'],
            'mobile'      => $data['mobile'],
            'is_match'    => $response['isMatched']
        ];
    }
}