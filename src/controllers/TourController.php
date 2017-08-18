<?php

namespace DeveoDK\LaravelCoreTour\Controllers;

use DeveoDK\LaravelCoreTour\Exceptions\TourNotFound;
use DeveoDK\LaravelCoreTour\Requests\NewCoreTour;
use DeveoDK\LaravelCoreTour\Services\BaseService;
use DeveoDK\LaravelCoreTour\Services\TourService;
use DeveoDK\LaravelCoreTour\Transformers\TourTransformer;
use Infrastructure\Http\BaseController;

class TourController extends BaseController
{
    /** @var TourService */
    private $tourService;

    /** @var BaseService */
    private $baseService;

    /**
     * TourController constructor.
     * @param TourService $tourService
     * @param BaseService $baseService
     */
    public function __construct(TourService $tourService, BaseService $baseService)
    {
        $this->baseService = $baseService;
        $this->tourService = $tourService;
    }

    /**
     * @param $slug
     * @return \Illuminate\Http\JsonResponse
     */
    public function getCoreTours($slug)
    {
        if (!$data = $this->tourService->getFromSlug($slug)) {
            throw new TourNotFound();
        }

        $this->baseService->setTransformer(new TourTransformer());

        return response()->json($this->baseService->transformItem($data));
    }

    /**
     * @param NewCoreTour $request
     */
    public function createCoreTours(NewCoreTour $request)
    {
        $this->tourService->createTour($request->data());
    }
}
