<?php

namespace App\Http\Controllers;

use App\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{

    /**
     * Save Image
     *
     * @param Request $request
     * @return Image
     */
    public function store(Request $request)
    {
        $image = new Image();

        $image->path = $request->input('name');
        $image->pet_id = $request->input('pet_id');

        $image->save();

        return $image;
    }

    /**
     * Save changes to Image
     *
     * @param Request $request
     * @param int $id
     * @return Image
     */
    public function update(int $id, Request $request)
    {
        $image = Image::find($id);

        $image->path = $request->input('name');
        $image->pet_id = $request->input('pet_id');

        $image->save();

        return $image;
    }

    /**
     * Remove Image
     *
     * @param int $id
     * @return int
     */
    public function destroy(int $id)
    {
        $image = Image::find($id);

        $image->delete();

        return $id;
    }

}
