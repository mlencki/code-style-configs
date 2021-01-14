<?php

declare(strict_types=1);

namespace MLencki\CodeStyle\EasyCodingStandard;

use MLencki\CodeStyle\Config as BaseConfig;
use Symplify\EasyCodingStandard\ValueObject\Option;
use Symplify\EasyCodingStandard\ValueObject\Set\SetList;

class Config extends BaseConfig
{
    public function __construct()
    {
        parent::__construct();

        $this->useSets([
            SetList::SPACES,
            SetList::ARRAY,
            SetList::DOCBLOCK,
            SetList::NAMESPACES,
            SetList::CONTROL_STRUCTURES,
            SetList::COMMENTS,
            SetList::CLEAN_CODE,
            SetList::PSR_12,
            SetList::PHP_70,
            SetList::PHP_71,
        ]);

        $this->setOption(Option::LINE_ENDING, "\n");
    }

    public function checkPhpUnit(): void
    {
        $this->addSet(SetList::PHPUNIT);
    }
}
