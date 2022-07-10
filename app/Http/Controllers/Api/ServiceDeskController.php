<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StoreServiceDeskRequest;
use App\Http\Requests\UpdateServiceDeskRequest;
use App\Models\ServiceDesk;

class ServiceDeskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreServiceDeskRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreServiceDeskRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ServiceDesk  $serviceDesk
     * @return \Illuminate\Http\Response
     */
    public function show(ServiceDesk $serviceDesk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ServiceDesk  $serviceDesk
     * @return \Illuminate\Http\Response
     */
    public function edit(ServiceDesk $serviceDesk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateServiceDeskRequest  $request
     * @param  \App\Models\ServiceDesk  $serviceDesk
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateServiceDeskRequest $request, ServiceDesk $serviceDesk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ServiceDesk  $serviceDesk
     * @return \Illuminate\Http\Response
     */
    public function destroy(ServiceDesk $serviceDesk)
    {
        //
    }
}
