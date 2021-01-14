<?php

declare(strict_types=1);

namespace MLencki\CodeStyle\EasyCodingStandard;

final class LaravelConfig extends Config
{
    public function __construct()
    {
        parent::__construct();

        $this->scanPaths(['app', 'bootstrap', 'config', 'database', 'routes']);
    }
}
