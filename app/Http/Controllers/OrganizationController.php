<?php

namespace App\Http\Controllers;

use App\Organization;
use Illuminate\Http\Request;

class OrganizationController extends Controller
{

    /**
     * Save Domain to Organization
     *
     * @param Request $request
     * @return Organization
     */
    public function store(Request $request)
    {
        $organization = new Organization();

        $organization->name = $request->input('name');

        $organization->save();

        return response($organization);
    }

    /**
     * Save changes to Organization
     *
     * @param Request $request
     * @param int $id
     * @return Organization
     */
    public function update(int $id, Request $request)
    {
        $organization = Organization::find($id);

        $organization->name = $request->input('name');

        $organization->save();

        return response($organization);
    }

    /**
     * Remove Organization
     *
     * @param int $id
     * @return int
     */
    public function destroy(int $id)
    {
        $organization = Organization::find($id);

        $organization->delete();

        return $id;
    }

}
