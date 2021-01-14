<?php

declare(strict_types=1);

use MLencki\CodeStyle\Rector\Config;
use MLencki\CodeStyle\Rector\LaravelConfig;
use PHPUnit\Framework\TestCase;
use Rector\Set\ValueObject\SetList;
use Symplify\EasyCodingStandard\ValueObject\Option;

final class RectorTest extends TestCase
{
    public function testIfRectorConfigIsConfiguredAsExpected(): void
    {
        $config = new Config();

        $this->assertSame(
            [
                Option::PATHS => [],
                Option::SETS => [
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
                ],
                Option::SKIP => [],
            ],
            $config->getOptions()
        );

        $this->assertIsCallable($config->get());
    }

    public function testIfLaravelConfigIsConfiguredAsExpected(): void
    {
        $laravelConfig = new LaravelConfig();

        $this->assertSame(
            [
                Option::PATHS => ['app', 'bootstrap', 'config', 'database', 'routes'],
                Option::SETS => [
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
                    SetList::LARAVEL_CODE_QUALITY,
                    SetList::LARAVEL_STATIC_TO_INJECTION,
                    SetList::LARAVEL_ARRAY_STR_FUNCTION_TO_STATIC_CALL,
                ],
                Option::SKIP => [],
            ],
            $laravelConfig->getOptions()
        );
    }

    public function testIfPhpUnitSniffsCanBeEnabled(): void
    {
        $config = new Config();

        $config->checkPhpUnit();

        $this->assertSame(
            [
                Option::PATHS => [],
                Option::SETS => [
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
                    SetList::PHPUNIT_91,
                    SetList::PHPUNIT_CODE_QUALITY,
                ],
                Option::SKIP => [],
            ],
            $config->getOptions(),
        );
    }
}
