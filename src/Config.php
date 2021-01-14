<?php

declare(strict_types=1);

namespace MLencki\CodeStyle;

use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symplify\EasyCodingStandard\ValueObject\Option;

class Config implements CodeStyleConfig
{
    protected array $options = [];

    public function __construct()
    {
        $this->scanPaths([]);
        $this->useSets([]);
        $this->skipSniffs([]);
    }

    public function get(): callable
    {
        $options = $this->options;

        return static function (ContainerConfigurator $containerConfigurator) use ($options): void {
            $parameters = $containerConfigurator->parameters();

            foreach ($options as $name => $value) {
                $parameters->set($name, $value);
            }
        };
    }

    public function setOption(string $name, mixed $value): void
    {
        $this->options[$name] = $value;
    }

    /**
     * @return mixed[]
     */
    public function getOptions(): array
    {
        return $this->options;
    }

    public function scanPaths(array $paths): void
    {
        $this->options[Option::PATHS] = $paths;
    }

    public function useSets(array $sets): void
    {
        $this->options[Option::SETS] = $sets;
    }

    public function skipSniffs(array $sniffs): void
    {
        $this->options[Option::SKIP] = $sniffs;
    }

    public function addPath(string $path): void
    {
        $this->options[Option::PATHS][] = $path;
    }

    public function addSet(string $set): void
    {
        $this->options[Option::SETS][] = $set;
    }

    public function addSkip(string $sniff): void
    {
        $this->options[Option::SKIP][] = $sniff;
    }
}
