<?php

declare(strict_types=1);

use MLencki\CodeStyle\Rector\Config;
use Rector\Core\Configuration\Option;

$config = new Config();
$config->scanPaths(['src', 'tests', 'ecs.php', 'rector.php']);
$config->setOption(Option::AUTOLOAD_PATHS, ['tests']);
$config->checkPhpUnit();

return $config->get();
