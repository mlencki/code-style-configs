<?php

declare(strict_types=1);

use MLencki\CodeStyle\EasyCodingStandard\Config;
use MLencki\CodeStyle\EasyCodingStandard\LaravelConfig;
use PHPUnit\Framework\TestCase;
use Symplify\EasyCodingStandard\ValueObject\Option;
use Symplify\EasyCodingStandard\ValueObject\Set\SetList;

class EcsTest extends TestCase
{
    public function testIfEcsConfigIsConfiguredAsExpected(): void
    {
        $config = new Config();

        $this->assertSame(
            [
                Option::PATHS => [],
                Option::SETS => [
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
                ],
                Option::SKIP => [],
                Option::LINE_ENDING => "\n",
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
                ],
                Option::SKIP => [],
                Option::LINE_ENDING => "\n",
            ],
            $laravelConfig->getOptions(),
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
                    SetList::PHPUNIT,
                ],
                Option::SKIP => [],
                Option::LINE_ENDING => "\n",
            ],
            $config->getOptions(),
        );
    }
}
