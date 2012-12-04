<?php

namespace App\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class HelloWorldController {
    public function indexAction(Request $request, Application $app) {
      return $app['twig']->render('hello_world/index.twig.html', array());
    }

    public function helloAction(Request $request, Application $app, $name) {
      return $app['twig']->render('hello_world/hello.twig.html', array('name' => $name));
    }
}