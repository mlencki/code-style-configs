<?php

declare(strict_types=1);

namespace MLencki\CodeStyle;

interface CodeStyleConfig
{
    public function get(): callable;

    public function setOption(string $name, mixed $value): void;

    public function getOptions(): array;

    public function useSets(array $sets): void;

    public function scanPaths(array $paths): void;

    public function skipSniffs(array $sniffs): void;

    public function addSet(string $set): void;

    public function addPath(string $path): void;

    public function addSkip(string $sniff): void;
}
