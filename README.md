# Simple wrapper for [symplify/easy-coding-standard](https://github.com/symplify/easy-coding-standard) config

## Installation

Using composer:
```bash
composer require mlencki/ecs-config --dev
```

## Usage

Example `ecs.php` configuration file:
```php
<?php

declare(strict_types=1);

use MLencki\EcsConfig\DefaultConfig;
use Symplify\EasyCodingStandard\ValueObject\Set\SetList;

$config = new DefaultConfig();
$config->setPaths(['ecs.php', 'src', 'tests']);
$config->addSet(SetList::PHPUNIT);

return $config->get();
```

## Local development

Install composer dependencies:
```bash
docker-compose run php composer install
```

Running code style checks:
```bash
docker-compose run php composer ecs
```

Running tests:
```bash
docker-compose run php composer tests
```
