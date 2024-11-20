<?php

namespace App\Vendors;

use App\Enums\ServicesEnum;
use App\Exceptions\BadRequestException;
use App\Traits\ResponderTrait;
use Exception;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;

class VendorManager
{
    use ResponderTrait;

    private Collection $vendors;

    public function __construct()
    {
        $this->vendors = $this->getVendors();
    }

    public function getVendors(): Collection
    {
        return Cache::remember('vendors', now()->addDay(), static function () {
            return collect(config('vendors'));
        });
    }

    public function callService(ServicesEnum $serviceEnum, array $params)
    {
        $serviceName = $serviceEnum->value;

        // Get available vendors sorted by priority
        foreach ($this->getAvailableVendors() as $vendor) {
            if ($service = $this->getService($vendor, $serviceEnum)) {
                $result = $this->executeService($vendor, $service, $params);
                if ($result !== null) {
                    return $result;
                }
            }
        }

        // If no vendor is available or all vendors failed
        return response()->json([
            'error'   => 'No provider is available at the moment',
            'service' => $serviceName
        ], 500);
    }

    protected function getAvailableVendors(): Collection
    {
        return $this->vendors->filter(fn($vendor) => $vendor['is_active'])->sortBy('priority');
    }

    protected function getService(array $vendor, ServicesEnum $serviceEnum)
    {
        return collect($vendor['services'])->where('name', $serviceEnum)->firstWhere('is_active', true);
    }


    /**
     * @param  array  $vendor
     * @param  array  $service
     * @param  array  $params
     * @return null
     * @throws BadRequestException
     */
    protected function executeService(array $vendor, array $service, array $params)
    {
        // Instantiate the vendor service class
        $serviceInstance = App::make($vendor['service']);

        try {
            return $serviceInstance->callService($service, $params);
        } catch (BadRequestException $exception) {
            throw new BadRequestException($exception->getMessage());
        } catch (Exception $e) {
            // Log the error or handle it as needed (optional logging can be added here)
            return null; // Return null to indicate failure and continue to next vendor
        }
    }
}