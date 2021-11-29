<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Organization;
use App\Http\Resources\OrganizationResource;

class OrganizationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($status = null)
    {
        if ($status != null) {
            $data = Organization::where('status', $status)->latest()->paginate(10);
        }
        else {
            $data = Organization::latest()->paginate(10);
        }

        return $this->jsonPaginatedResponse('Organizations', OrganizationResource::collection($data));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function updateStatus($id, $status)
    {
        $org = Organization::findOrFail($this->decodeId($id));
        $org->status = $status;
        $org->save();

        return response([
            'status' => true,
            'message' => 'Organization status updated successfully',
            'data' => new OrganizationResource($org)]);
    }
}
