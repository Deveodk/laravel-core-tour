<?php

use DeveoDK\LaravelCoreTour\Controllers\TourController;
use Illuminate\Routing\Router;

/** @var Router $router */
$router = app(Router::class);

$router->group(['middleware' => 'jwt.validToken'], function () use ($router) {
    $router->get('core/tours/{slug}', TourController::class . '@getCoreTours');
    $router->post('core/tours', TourController::class . '@createCoreTours');
});