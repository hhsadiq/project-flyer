<?php

namespace App\Http\Controllers;

use App\AddPhotoToFlyer;
use App\Flyer;
use App\Http\Requests;
use App\Http\Requests\AddPhotoRequest;

class FlyerPhotosController extends Controller
{
    /**
     * Apply a photo to the referenced flyer.
     *
     * @param string $zip
     * @param string $street
     * @param AddPhotoRequest $request
     */
    public function store($zip, $street, AddPhotoRequest $request)
    {
        $flyer = Flyer::locatedAt($zip, $street);

        $photo = $request->file('photo');

        (new AddPhotoToFlyer($flyer, $photo))->save();
    }

}
