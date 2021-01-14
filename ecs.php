<?php

declare(strict_types=1);

use MLencki\CodeStyle\EasyCodingStandard\Config;

$config = new Config();
$config->scanPaths(['src', 'tests', 'ecs.php', 'rector.php']);
$config->checkPhpUnit();

return $config->get();
