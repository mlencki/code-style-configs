<?php

declare(strict_types=1);

namespace MLencki\EcsConfig\Laravel;

use MLencki\EcsConfig\DefaultConfig;

class Config extends DefaultConfig
{
    protected array $paths = [
        'app',
        'bootstrap',
        'config',
        'database',
        'public',
        'routes',
    ];
}
