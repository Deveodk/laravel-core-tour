<?php

namespace DeveoDK\LaravelCoreTour\Transformers;

use League\Fractal;

class TourTransformer extends Fractal\TransformerAbstract
{
    /**
     * @param $data
     * @return array
     */
    public function transform($data)
    {
        return [
            'id' => (int) $data->id,
            'slug' => (string) $data->slug,
            'created_at' => (object) $data->created_at,
            'updated_at' => (object) $data->updated_at
        ];
    }
}
