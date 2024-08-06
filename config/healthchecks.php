<?php

declare(strict_types=1);

return [
    'base_url' => env('HEALTHCHECKS_BASE_URL', ''),
    'modules'  => [
        'default' => [
            'uuid' => env('HEALTHCHECKS_DEFAULT_UUID', ''),
        ],
    ],
];
