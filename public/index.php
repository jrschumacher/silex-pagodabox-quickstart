<?php

$env = getenv('APP_ENV') ?: 'prod';

require_once __DIR__.'/../vendor/autoload.php';

$app = require_once '../app/bootstrap_'.$env.'.php';

$app['http_cache']->run();
