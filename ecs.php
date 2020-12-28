<?php

declare(strict_types=1);

use MLencki\EcsConfig\DefaultConfig;
use Symplify\EasyCodingStandard\ValueObject\Set\SetList;

$config = new DefaultConfig();
$config->setPaths(['ecs.php', 'src', 'tests']);
$config->addSet(SetList::PHPUNIT);

return $config->get();
