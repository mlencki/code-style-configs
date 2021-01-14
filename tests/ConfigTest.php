<?php

declare(strict_types=1);

use MLencki\CodeStyle\Config;
use PHPUnit\Framework\TestCase;
use Rector\Core\Configuration\Option as RectorOption;
use Symplify\EasyCodingStandard\ValueObject\Option as EcsOption;

final class ConfigTest extends TestCase
{
    public function testIfConfigCanBeConfiguredProperly(): void
    {
        $config = new Config();

        $this->assertSame(
            [
                EcsOption::PATHS => [],
                EcsOption::SETS => [],
                EcsOption::SKIP => [],
            ],
            $config->getOptions()
        );

        $config->scanPaths(['path1', 'path2']);
        $config->addPath('path3');

        $config->useSets(['set1', 'set2']);
        $config->addSet('set3');

        $config->skipSniffs(['sniff1', 'sniff2']);
        $config->addSkip('sniff3');

        $config->setOption('custom-option', 'value');

        $this->assertSame(
            [
                EcsOption::PATHS => ['path1', 'path2', 'path3'],
                EcsOption::SETS => ['set1', 'set2', 'set3'],
                EcsOption::SKIP => ['sniff1', 'sniff2', 'sniff3'],
                'custom-option' => 'value',
            ],
            $config->getOptions()
        );
    }

    public function testIfEcsAndRectorHasTheSameOptionKeys(): void
    {
        $this->assertSame(EcsOption::PATHS, RectorOption::PATHS);
        $this->assertSame(EcsOption::SETS, RectorOption::SETS);
        $this->assertSame(EcsOption::SKIP, RectorOption::SKIP);
    }
}
