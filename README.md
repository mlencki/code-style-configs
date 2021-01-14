# PHP Code Style Configs

Ready to use config wrappers for [easy-coding-standard](https://github.com/symplify/easy-coding-standard) and [rector](https://github.com/rectorphp/rector) code style fixers.

## Installation

Using composer:
```bash
composer require mlencki/code-style-configs --dev
```

## Usage

Simplest `ecs.php` configuration file example:
```php
<?php

declare(strict_types=1);

use MLencki\CodeStyle\EasyCodingStandard\Config;

$config = new Config();
$config->scanPaths(['src', 'tests']);

return $config->get();
```

The same for `rector.php`:
```php
<?php

declare(strict_types=1);

use MLencki\CodeStyle\Rector\Config;
use Rector\Core\Configuration\Option;

$config = new Config();
$config->scanPaths(['src', 'tests']);
$config->setOption(Option::AUTOLOAD_PATHS, ['tests']);

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
