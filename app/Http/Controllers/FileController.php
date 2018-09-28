<?php

namespace App\Http\Controllers;

use App\File;
use Illuminate\Http\Request;

class FileController extends Controller
{

    /**
     * Save File
     *
     * @param Request $request
     * @return File
     */
    public function store(Request $request)
    {
        $file = new File();

        $file->path = $request->input('name');
        $file->pet_id = $request->input('pet_id');

        $file->save();

        return $file;
    }

    /**
     * Save changes to File
     *
     * @param Request $request
     * @param int $id
     * @return File
     */
    public function update(int $id, Request $request)
    {
        $file = File::find($id);

        $file->path = $request->input('name');
        $file->pet_id = $request->input('pet_id');

        $file->save();

        return $file;
    }

    /**
     * Remove File
     *
     * @param int $id
     * @return int
     */
    public function destroy(int $id)
    {
        $file = File::find($id);

        $file->delete();

        return $id;
    }

}
