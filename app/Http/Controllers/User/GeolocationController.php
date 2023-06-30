<?php

namespace App\Http\Controllers\User;

use App\Classes\Geolocation\Sputnik\Api as GeolocationApi;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GeolocationController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return array|null[]|string[]
     */
    public function decodeAddress(Request $request)
    {
        return (new GeolocationApi())->getCoordinatesFromAddress($request->address);
    }
}
