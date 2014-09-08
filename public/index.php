<?php

require '../vendor/autoload.php';

// Setup Slim
$app = new \Slim\Slim();

$app->config('debug', true);

// Add Twig to DI
$app->container->singleton('twig', function ($c) {
  $twig = new \Slim\Views\Twig();

  // Set options
  $twig->parserOptions = array(
    'debug' => true,
    //'cache' => '../cache'
  );

  /* Extensions */
  $twig->parserExtensions = array(
    new \Slim\Views\TwigExtension(),
  );

  $templatesPath = '../templates';
  $twig->setTemplatesDirectory($templatesPath);

  return $twig;
});

// Set routes
$app->get('/', function () use ($app) {
  $app->twig->display('front.twig', array('foo' => 'bar'));
})->name('front');

$app->run();

