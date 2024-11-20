<?php

namespace App\Services\Tls;

use App\Models\IdInformation;
use App\Services\BaseService;

class IdInformationService extends BaseService
{
    public function getModelClass(): string
    {
        return IdInformation::class;
    }

    public function transformRequest(array $data): array
    {
        return [
            'nationalCode' => $data['national_id'],
            'birthDate'    => $data['birthday'],
        ];
    }

    public function transformResponse(array $response, ?array $data): array
    {
        return [
            'national_id'           => $data['national_id'],
            'birthday'              => $data['birthday'],
            'first_name'            => $response['firstName'],
            'last_name'             => $response['lastName'],
            'father_name'           => $response['fatherName'],
            'gender'                => $response['gender'],
            'live_status'           => $response['liveStatus'],
            'identification_number' => $response['identificationNo'],
            'identification_serial' => $response['identificationSerial'],
            'identification_series' => $response['identificationSeri'],
            'office_name'           => $response['officeName']
        ];
    }
}