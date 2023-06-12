<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dev_Language;
use App\Http\Requests\StoreDev_LanguageRequest;
use App\Http\Requests\UpdateDev_LanguageRequest;

class DevLanguageController extends Controller
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
     * @param  \App\Http\Requests\StoreDev_LanguageRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDev_LanguageRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dev_Language  $dev_Language
     * @return \Illuminate\Http\Response
     */
    public function show(Dev_Language $dev_Language)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dev_Language  $dev_Language
     * @return \Illuminate\Http\Response
     */
    public function edit(Dev_Language $dev_Language)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDev_LanguageRequest  $request
     * @param  \App\Models\Dev_Language  $dev_Language
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDev_LanguageRequest $request, Dev_Language $dev_Language)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dev_Language  $dev_Language
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dev_Language $dev_Language)
    {
        //
    }
}
