<?php

namespace App\Vendors;


use App\Exceptions\BadRequestException;
use App\Models\ServiceModel;
use App\Services\BaseService;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

abstract class BaseVendor
{
    public array $serviceMap;

    /**
     * Get the authentication token for the vendor.
     *
     * @return string|null
     */
    abstract public function getToken(): ?string;

    /**
     * @param  array  $params
     * @return Response
     * @throws BadRequestException
     */
    public function makeApiRequest(array $params): Response
    {
        $response = Http::withHeaders(['Accept-Encoding' => 'gzip'])
            ->withToken($this->getToken())->acceptJson()->asJson()->{$params['method']}($params['url'], $params['data'] ?? []);

        if ($response->failed()) {
            if ($response->status() === 400) {
                throw new BadRequestException('اطلاعات هویتی یافت نشد');
            }
            Log::error('API request failed', ['url' => $params['url'], 'response' => $response->body()]);
            throw new ValidationException($response->body());
        }

        return $response;
    }

    /**
     * @param  BaseService  $service
     * @param  array  $data
     * @return array
     */
    public function handle(BaseService $service, array $data): array
    {
        $model = $service->getModelClass()::where($data)->first();
        $trackId = Str::uuid();
        $isCached = true;

        if (!$model) {
            $isCached = false;

            $params = [
                'method' => $service->method,
                'url'    => $service->url,
                'data'   => $service->transformRequest($data),
            ];

            $response = $this->makeApiRequest($params);

            $trackId = $response->header('track-code');
            $modelResponse = $service->transformResponse($response->json(), $data);

            $model = $service->getModelClass()::create($modelResponse);
        }

        $this->logRequestResponse($service, $model, $trackId, $isCached, $data);

        return $model->toArray();
    }

    /**
     * @param  BaseService  $service
     * @param  ServiceModel  $model
     * @param  string  $trackId
     * @param  bool  $isCached
     * @param  array  $data
     * @return void
     */
    private function logRequestResponse(BaseService $service, ServiceModel $model, string $trackId, bool $isCached, array $data): void
    {
        $logData = [
            'user_id'   => auth()->id(),
            'track_id'  => $trackId,
            'price'     => $service->price,
            'is_cached' => $isCached,
            'request'   => $data,
            'response'  => $model->toArray(),
        ];

        $model->logs()->create($logData);
    }
}