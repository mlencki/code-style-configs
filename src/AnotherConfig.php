<?php

declare(strict_types=1);

namespace MLencki\EcsConfig;

use Symplify\EasyCodingStandard\ValueObject\Set\SetList;

class AnotherConfig extends Config
{
    protected array $sets = [
        SetList::SPACES,
        SetList::ARRAY,
        SetList::DOCBLOCK
    ];
}