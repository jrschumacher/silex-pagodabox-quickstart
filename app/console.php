<?php

use Symfony\Component\Console\Application;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

$console = new Application('Silex Application', 'n/a');

$console
    ->register('cache:clear')
    ->setDefinition(array(
    ))
    ->setDescription('Clear application cache')
    ->setCode(function (InputInterface $input, OutputInterface $output) use ($app) {
        $cache = __DIR__.'/storage/cache/*';
        `rm -rf $cache`;
    })
;

return $console;