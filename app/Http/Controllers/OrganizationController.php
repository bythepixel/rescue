<?php

namespace App\Http\Controllers;

use App\Organization;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller;

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

        return $organization;
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

        return $organization;
    }

    /**
     * Remove Organization
     *
     * @param int $id
     * @return string
     */
    public function destroy(int $id)
    {
        $organization = Organization::find($id);

        $organization->delete();

        return "success";
    }

}
