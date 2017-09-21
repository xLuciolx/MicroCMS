<?php

use MicroCMS\DAO\CommentDAO;
use Symfony\Component\Debug\ErrorHandler;
use Symfony\Component\Debug\ExceptionHandler;

//Register global error and exception handlers
ErrorHandler::register();
ExceptionHandler::register();

//Register service providers
//Doctrine
$app->register(new Silex\Provider\DoctrineServiceProvider());
//Twig
$app->register(new Silex\Provider\TwigServiceProvider(), array(
  'twig.path' => __DIR__ . '/../views',
));
//Assets
$app->register(new Silex\Provider\AssetServiceProvider(), array('assets.version' => 'v1'));

//Register services
$app['dao.article'] = function ($app) {
  return new MicroCMS\DAO\ArticleDAO($app['db']);
};

$app['dao.comment'] = function ($app){
  $commentDAO = new CommentDAO($app['db']);
  $commentDAO->setArticleDAO($app['dao.article']);
  return $commentDAO;
};
