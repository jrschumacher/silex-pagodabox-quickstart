<?php

use Silex\Provider\FormServiceProvider;
use Silex\Provider\HttpCacheServiceProvider;
use Silex\Provider\MonologServiceProvider;
use Silex\Provider\SessionServiceProvider;
use Silex\Provider\TranslationServiceProvider;
use Silex\Provider\TwigServiceProvider;
use Silex\Provider\UrlGeneratorServiceProvider;
use Silex\Provider\ValidatorServiceProvider;
use Igorw\Silex\ConfigServiceProvider;

$app = new Silex\Application();

$app->register(new SessionServiceProvider());
$app->register(new ValidatorServiceProvider());
$app->register(new FormServiceProvider());
$app->register(new UrlGeneratorServiceProvider());

$app->register(new HttpCacheServiceProvider(), array(
  'http_cache.cache_dir' => __DIR__.'/../storage/http_cache'
));

$app->register(new MonologServiceProvider(), array(
    'monolog.logfile' => __DIR__.'/../storage/log/app.log',
    'monolog.name' => 'app',
    'monolog.level' => 300 // = Logger::WARNING
));

$app->register(new TwigServiceProvider(), array(
    'twig.path' => array(__DIR__.'/templates'),
    'twig.options' => array(
      'cache' => __DIR__.'/../storage/cache',
      $env !== 'dev' ?: 'debug' => true
    )
));

$app->register(new ConfigServiceProvider(__DIR__.'/config/config_'.$env.'.json'), array(
    'storage' => __DIR__.'/../storage'
));

require __DIR__.'/routes.php';

return $app;