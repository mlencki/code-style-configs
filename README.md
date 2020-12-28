## Simple wrapper for ecs config

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