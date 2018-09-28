<?php

namespace App\Http\Controllers;

use App\Image;
use App\Services\ImageService;
use Illuminate\Http\Request;

class ImageController extends Controller
{

    /**
     * Save Image
     *
     * @param Request $request
     * @return Image
     * @throws \League\Flysystem\FileExistsException
     */
    public function store(Request $request)
    {
        $image = new Image();

        $imageFile = $request->file('image');
        $imageService = new ImageService();
        $imageService->upload('/', $imageFile);

        $image->path = $imageFile->path();
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
     * @throws \League\Flysystem\FileNotFoundException
     */
    public function update(int $id, Request $request)
    {
        $image = Image::find($id);

        $imageFile = $request->file('image');
        $imageService = new ImageService();
        $imageService->update('/', $imageFile);

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
     * @throws \League\Flysystem\FileNotFoundException
     */
    public function destroy(int $id)
    {
        $image = Image::find($id);

        $imageService = new ImageService();
        $imageService->delete($image->path);

        $image->delete();

        return "success";
    }

}
