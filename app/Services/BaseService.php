<?php

namespace App\Services;


abstract class BaseService
{
    public string $url;
    public int $price;
    public string $method;

    public function __construct(string $url, int $price, string $method)
    {
        $this->url = $url;
        $this->price = $price;
        $this->method = $method;
    }


    abstract public function getModelClass(): string;

    abstract public function transformRequest(array $data): array;

    abstract public function transformResponse(array $response, ?array $data): array;
}