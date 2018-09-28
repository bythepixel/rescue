<?php

namespace App\Http\Controllers;

use App\File;
use App\Services\FileService;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller;

class FileController extends Controller
{

    /**
     * Save File
     *
     * @param Request $request
     * @param FileService $fileService
     * @return File
     */
    public function store(Request $request, FileService $fileService)
    {
        $file = new File();

        $file->path = $request->input('name');
        $file->pet_id = $request->input('pet_id');

        $fileService->store($request->file('file'));
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

        return "success";
    }

}
