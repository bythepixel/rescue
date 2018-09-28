<?php

namespace App\Http\Controllers;

use App\Pet;
use Illuminate\Http\Request;

class PetController extends Controller
{
    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function index()
    {
        return Pet::with('user')->get();
    }

    /**
     * @param int $id
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|null|static|static[]
     */
    public function show(int $id)
    {
        return Pet::with(['user', 'organization', 'species', 'status'])->find($id);
    }

    /**
     * @param int $id
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|null|static|static[]
     */
    public function publicShow(int $id)
    {
        return Pet::with(['organization', 'species', 'status'])->find($id);
    }

    /**
     * @param Request $request
     * @return Pet
     */
    public function store(Request $request)
    {
        $pet = $this->modify(new Pet(), $request);

        $pet->save();

        return $pet;
    }

    /**
     * @param int $id
     * @param Request $request
     * @return Pet
     */
    public function update(int $id, Request $request)
    {
        $pet = $this->modify(Pet::find($id), $request);

        $pet->save();

        return $pet;
    }

    /**
     * @param int $id
     * @return string
     */
    public function destroy(int $id)
    {
        Pet::destroy($id);

        return "success";
    }

    /**
     * @param Pet $pet
     * @param Request $request
     * @return Pet
     */
    private function modify(Pet $pet, Request $request): Pet
    {
        $pet->name            = $request->input('name');
        $pet->breed           = $request->input('breed');
        $pet->description     = $request->input('description');
        $pet->age             = $request->input('age');
        $pet->birth           = $request->input('birth');
        $pet->weight          = $request->input('weight');
        $pet->fee             = $request->input('fee');
        $pet->organization_id = 1;
        $pet->species_id      = $request->input('species_id');
        $pet->status_id       = $request->input('status_id');
        $pet->user_id         = $request->input('user_id');

        return $pet;
    }
}
