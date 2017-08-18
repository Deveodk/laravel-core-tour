<?php

namespace DeveoDK\LaravelCoreTour\Services;

use DeveoDK\LaravelCoreTour\Models\CoreTour;
use Illuminate\Database\DatabaseManager;
use Illuminate\Events\Dispatcher;

class TourService extends BaseService
{
    /**
     * TimeTrackService constructor.
     * @param Dispatcher $dispatcher
     * @param DatabaseManager $database
     * @param OptionService $optionService
     */
    public function __construct(
        Dispatcher $dispatcher,
        DatabaseManager $database,
        OptionService $optionService
    ) {
        parent::__construct($dispatcher, $database, $optionService);
    }

    /**
     * @param $slug
     * @return mixed
     */
    public function getFromSlug($slug)
    {
        $user = user();
        $userClass = get_class($user);

        return CoreTour::where('authenticable_type', '=', $userClass)
            ->where('authenticable_id', '=', $user->id)
            ->where('slug', '=', $slug)->first();
    }

    /**
     * @param $params
     */
    public function createTour($params)
    {
        $user = user();

        $timeTrack = new CoreTour();
        $timeTrack->slug = $params['slug'];
        $timeTrack->authenticable_id = $user->id;
        $timeTrack->authenticable_type = get_class($user);
        $timeTrack->save();
    }
}
