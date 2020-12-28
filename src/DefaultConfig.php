<?php

declare(strict_types=1);

namespace MLencki\EcsConfig;

use Symplify\EasyCodingStandard\ValueObject\Set\SetList;

class DefaultConfig extends Config
{
    protected array $sets = [
        SetList::SPACES,
        SetList::ARRAY,
        SetList::DOCBLOCK,
        SetList::NAMESPACES,
        SetList::CONTROL_STRUCTURES,
        SetList::COMMENTS,
        SetList::DEAD_CODE,
        SetList::CLEAN_CODE,
        SetList::PSR_12,
        SetList::PHP_70,
        SetList::PHP_71,
    ];
}
