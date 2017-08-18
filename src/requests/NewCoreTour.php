<?php

namespace DeveoDK\LaravelCoreTour\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewCoreTour extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules()
    {
        return [
            'slug' => 'required|string',
        ];
    }

    /**
     * Give the data back
     * @return array
     */
    public function data()
    {
        return [
            'slug' => $this->slug
        ];
    }
}
