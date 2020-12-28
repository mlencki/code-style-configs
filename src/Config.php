<?php

declare(strict_types=1);

namespace MLencki\EcsConfig;

use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symplify\EasyCodingStandard\ValueObject\Option;

class Config
{
    protected array $sets = [];

    protected array $skips = [];

    protected array $paths = [];

    public function get(): callable
    {
        $sets = $this->getSets();
        $skips = $this->getSkips();
        $paths = $this->getPaths();

        return static function (ContainerConfigurator $containerConfigurator) use ($sets, $skips, $paths): void {
            $parameters = $containerConfigurator->parameters();
            $parameters->set(Option::SETS, $sets);
            $parameters->set(Option::SKIP, $skips);
            $parameters->set(Option::PATHS, $paths);
        };
    }

    public function setSets(array $sets): void
    {
        $this->sets = $sets;
    }

    public function addSet(string $set): void
    {
        $this->sets[] = $set;
    }

    public function setSkips(array $skips): void
    {
        $this->skips = $skips;
    }

    public function addSkip(string $skip): void
    {
        $this->skips[] = $skip;
    }

    public function setPaths(array $paths): void
    {
        $this->paths = $paths;
    }

    public function addPath(string $path): void
    {
        $this->paths[] = $path;
    }

    protected function getSets(): array
    {
        return $this->sets;
    }

    protected function getSkips(): array
    {
        return $this->skips;
    }

    protected function getPaths(): array
    {
        return $this->paths;
    }
}
