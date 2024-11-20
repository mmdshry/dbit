<?php

return [
    [
        'name' => 'TLSService',
        'service' => \App\Vendors\TlsVendor::class,
        'services' => config('tls'),
        'priority' => 1,
        'is_active' => true,
    ]
];
