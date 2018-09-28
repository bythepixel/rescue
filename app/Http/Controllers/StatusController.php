<?php

namespace App\Http\Controllers;

use App\Status;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function index()
    {
        return Status::with('organization')->get();
    }

    /**
     * @param int $id
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|null|static|static[]
     */
    public function show(int $id)
    {
        return Status::with(['user', 'organization', 'species', 'status'])->find($id);
    }

    /**
     * @param Request $request
     * @return Status
     */
    public function store(Request $request)
    {
        $status = $this->modify(new Status(), $request);

        $status->save();

        return $status;
    }

    /**
     * @param int $id
     * @param Request $request
     * @return string
     */
    public function update(int $id, Request $request)
    {
        $status = $this->modify(Status::find($id), $request);

        $status->save();

        return "success";
    }

    /**
     * @param int $id
     * @return string
     */
    public function destroy(int $id)
    {
        Status::destroy($id);

        return "success";
    }

    /**
     * @param Status $status
     * @param Request $request
     * @return Status
     */
    private function modify(Status $status, Request $request): Status
    {
        $status->name            = $request->input('name');
        $status->organization_id = $request->input('organization_id');

        return $status;
    }
}
