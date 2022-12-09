<?php

namespace App\Http\Controllers;

use App\Models\SavedPost;
use App\Http\Requests\StoreSavedPostRequest;
use App\Http\Requests\UpdateSavedPostRequest;

class SavedPostController extends Controller
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
     * @param  \App\Http\Requests\StoreSavedPostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSavedPostRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SavedPost  $savedPost
     * @return \Illuminate\Http\Response
     */
    public function show(SavedPost $savedPost)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SavedPost  $savedPost
     * @return \Illuminate\Http\Response
     */
    public function edit(SavedPost $savedPost)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSavedPostRequest  $request
     * @param  \App\Models\SavedPost  $savedPost
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSavedPostRequest $request, SavedPost $savedPost)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SavedPost  $savedPost
     * @return \Illuminate\Http\Response
     */
    public function destroy(SavedPost $savedPost)
    {
        //
    }
}
