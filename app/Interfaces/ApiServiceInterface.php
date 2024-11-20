<?php

namespace App\Interfaces;

use Illuminate\Http\JsonResponse;

interface ApiServiceInterface
{
    public function getToken(): string|null;
    public function fetchData(string $service, array $data): array;
    public function getPrice(): int;
    public function getServices(): array;

    public function makeApiRequest(array $params): JsonResponse;

}