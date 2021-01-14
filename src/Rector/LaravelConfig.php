<?php

declare(strict_types=1);

namespace MLencki\CodeStyle\Rector;

use Rector\Set\ValueObject\SetList;

final class LaravelConfig extends Config
{
    public function __construct()
    {
        parent::__construct();

        $this->scanPaths(['app', 'bootstrap', 'config', 'database', 'routes']);

        $this->addSet(SetList::LARAVEL_CODE_QUALITY);
        $this->addSet(SetList::LARAVEL_STATIC_TO_INJECTION);
        $this->addSet(SetList::LARAVEL_ARRAY_STR_FUNCTION_TO_STATIC_CALL);
    }
}
