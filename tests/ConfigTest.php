<?php

declare(strict_types=1);

use MLencki\EcsConfig\Config;
use MLencki\EcsConfig\DefaultConfig;
use MLencki\EcsConfig\Laravel\Config as LaravelConfig;
use PhpCsFixer\Fixer\ArrayNotation\ArraySyntaxFixer;
use PhpCsFixer\Fixer\Basic\BracesFixer;
use PhpCsFixer\Fixer\Semicolon\MultilineWhitespaceBeforeSemicolonsFixer;
use PHPUnit\Framework\TestCase;
use Symplify\EasyCodingStandard\ValueObject\Set\SetList;

class ConfigTest extends TestCase
{
    /**
     * @throws ReflectionException
     */
    public function testEcsCanBeConfiguredProperly(): void
    {
        $config = new Config();

        $this->assertSame([], $this->callProtectedMethod($config, 'getSets'));
        $this->assertSame([], $this->callProtectedMethod($config, 'getSkips'));
        $this->assertSame([], $this->callProtectedMethod($config, 'getPaths'));

        $config->setPaths(['tests1', 'tests2']);
        $config->addPath('tests3');

        $config->setSets([SetList::COMMON, SetList::CLEAN_CODE]);
        $config->addSet(SetList::PHPUNIT);

        $config->setSkips([ArraySyntaxFixer::class, BracesFixer::class]);
        $config->addSkip(MultilineWhitespaceBeforeSemicolonsFixer::class);

        $this->assertSame(
            [SetList::COMMON, SetList::CLEAN_CODE, SetList::PHPUNIT],
            $this->callProtectedMethod($config, 'getSets')
        );
        $this->assertSame(
            [ArraySyntaxFixer::class, BracesFixer::class, MultilineWhitespaceBeforeSemicolonsFixer::class],
            $this->callProtectedMethod($config, 'getSkips')
        );
        $this->assertSame(['tests1', 'tests2', 'tests3'], $this->callProtectedMethod($config, 'getPaths'));
        $this->assertIsCallable($config->get());
    }

    /**
     * @throws ReflectionException
     */
    public function testDefaultConfigIsConfiguredAsExpected(): void
    {
        $config = new DefaultConfig();

        $this->assertSame(
            [
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
            $this->callProtectedMethod($config, 'getSets')
        );
        $this->assertSame([], $this->callProtectedMethod($config, 'getSkips'));
        $this->assertSame([], $this->callProtectedMethod($config, 'getPaths'));
        $this->assertIsCallable($config->get());
    }

    /**
     * @throws ReflectionException
     */
    public function testLaravelConfigIsConfiguredAsExpected(): void
    {
        $config = new LaravelConfig();

        $this->assertSame(
            [
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
            $this->callProtectedMethod($config, 'getSets')
        );
        $this->assertSame([], $this->callProtectedMethod($config, 'getSkips'));
        $this->assertSame(
            [
                'app',
                'bootstrap',
                'config',
                'database',
                'public',
                'routes',
            ],
            $this->callProtectedMethod($config, 'getPaths')
        );
        $this->assertIsCallable($config->get());
    }

    /**
     * @throws ReflectionException
     */
    protected function callProtectedMethod(Config $config, string $method, array $args = []): mixed
    {
        $reflectionClass = new ReflectionClass($config::class);
        $method = $reflectionClass->getMethod($method);
        $method->setAccessible(true);

        return $method->invokeArgs($config, $args);
    }
}
