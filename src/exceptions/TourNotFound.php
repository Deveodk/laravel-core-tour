<?php

namespace DeveoDK\LaravelCoreTour\Exceptions;

use Symfony\Component\HttpKernel\Exception\HttpException;

class TourNotFound extends HttpException
{
    public function __construct()
    {
        parent::__construct(404, 'Tour not found');
    }
}
