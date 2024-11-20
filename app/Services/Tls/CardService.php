<?php

namespace App\Services\Tls;

use App\Models\Card;
use App\Services\BaseService;

class CardService extends BaseService
{
    public function getModelClass(): string
    {
        return Card::class;
    }

    public function transformRequest(array $data): array
    {
        return ['cardNumber' => $data['card_number']];
    }

    public function transformResponse(array $response, ?array $data): array
    {
        return [
            'card_number'    => $data['card_number'],
            'bank'           => $response['cardInfo']['bank'],
            'type'           => $response['cardInfo']['type'],
            'owner'          => $response['cardInfo']['ownerName'],
            'deposit_number' => $response['cardInfo']['depositNumber'],
        ];
    }
}