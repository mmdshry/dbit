<?php

namespace App\Services\Tls;

use App\Models\IdImage;
use App\Services\BaseService;

class IdImageService extends BaseService
{
    public function getModelClass(): string
    {
        return IdImage::class;
    }

    public function transformRequest(array $data): array
    {
        return [
            'nationalId' => $data['national_id'],
            'birthDate'  => $data['birthday']
        ];
    }

    public function transformResponse(array $response, ?array $data): array
    {
        return [
            'national_id' => $data['national_id'],
            'birthday'    => $data['birthday'],
            'image'       => $response['image']
        ];
    }
}