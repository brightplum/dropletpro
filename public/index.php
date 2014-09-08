<?php

require '../vendor/autoload.php';

// Setup Slim
$app = new \Slim\Slim();

$devmode = ($_SERVER['HTTP_HOST'] == 'dropletpro.dev') ? TRUE : FALSE;

if ($devmode) {
  $app->config('debug', TRUE);
}

// Add Twig to DI
$app->container->singleton('twig', function ($devmode) {
  $twig = new \Slim\Views\Twig();

  // Set options
  if ($devmode) {
    $options = array(
      'debug' => TRUE,
    );
  }
  else {
    $options = array(
      'cache' => '../cache'
    );
  }

  $twig->parserOptions = $options;

  // Add Twig extension
  $twig->parserExtensions = array(
    new \Slim\Views\TwigExtension(),
  );

  $templatesPath = '../templates';
  $twig->setTemplatesDirectory($templatesPath);

  return $twig;
});

// Set routes
$app->get('/', function () use ($app) {
  $app->twig->display('front.twig', array('front' => TRUE));
})->name('front');

$app->get('/pricing', function () use ($app) {
  $app->twig->display('page.twig', array('title' => 'Pricing'));
})->name('pricing');

$app->run();

