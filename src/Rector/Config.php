<?php

declare(strict_types=1);

namespace MLencki\CodeStyle\Rector;

use MLencki\CodeStyle\Config as BaseConfig;
use Rector\Set\ValueObject\SetList;

class Config extends BaseConfig
{
    public function __construct()
    {
        parent::__construct();

        $this->useSets(
            [
                SetList::CODING_STYLE,
                SetList::CODE_QUALITY,
                SetList::CODE_QUALITY_STRICT,
                SetList::DEAD_CODE,
                SetList::DEAD_DOC_BLOCK,
                SetList::NAMING,
                SetList::DEFLUENT,
                SetList::TYPE_DECLARATION,
                SetList::PHP_71,
                SetList::PHP_72,
                SetList::PHP_73,
                SetList::PHP_74,
                SetList::PHP_80,
                SetList::EARLY_RETURN,
            ]
        );
    }

    public function checkPhpUnit(): void
    {
        $this->addSet(SetList::PHPUNIT_91);
        $this->addSet(SetList::PHPUNIT_CODE_QUALITY);
    }
}
