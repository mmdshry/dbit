<?php

namespace App\Vendors;

use App\Services\Tls\CardService;
use App\Services\Tls\IdImageService;
use App\Services\Tls\IdInformationService;
use App\Services\Tls\MatchCardIdService;
use App\Services\Tls\ShahkarService;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use RuntimeException;

class TlsVendor extends BaseVendor
{
    /**
     * Map of service names to their corresponding classes.
     *
     * @var array
     */
    public array $serviceMap = [
        'Card' => CardService::class,
        'Shahkar' => ShahkarService::class,
        'IdImage' => IdImageService::class,
        'IdInformation' => IdInformationService::class,
        'MatchCardId' => MatchCardIdService::class,
    ];

    /**
     * Retrieve and cache the TLS token.
     *
     * @return string
     *
     * @throws RuntimeException
     */
    public function getToken(): string
    {
        return Cache::remember('tls_token', now()->addHour(), function () {
            $response = Http::post(config('services.tls.url'), [
                'username' => config('services.tls.username'),
                'password' => config('services.tls.password'),
            ]);

            if ($response->failed()) {
                Log::error('Failed to fetch TLS token', ['response' => $response->body()]);
                throw new RuntimeException('Unable to authenticate with TLS service.');
            }

            return $response->json('access_token');
        });
    }

    /**
     * Dynamically call the requested service.
     *
     * @param array $service Details of the service to call.
     * @param array $data Input data for the service.
     *
     * @return array Response from the service.
     *
     * @throws RuntimeException
     */
    public function callService(array $service, array $data): array
    {
        $serviceName = $service['name']->value;

        if (!isset($this->serviceMap[$serviceName])) {
            throw new RuntimeException("Service {$serviceName} is not supported.");
        }

        $serviceProvider = $this->resolveService($this->serviceMap[$serviceName], $service);
        return $this->handle($serviceProvider, $data);
    }

    /**
     * Resolve the service provider instance.
     *
     * @param string $serviceClass The class name of the service.
     * @param array $service Service configuration details.
     *
     * @return object
     */
    private function resolveService(string $serviceClass, array $service): object
    {
        return new $serviceClass($service['url'], $service['price'], $service['method']);
    }
}
