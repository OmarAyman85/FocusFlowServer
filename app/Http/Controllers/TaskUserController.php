<?php

namespace App\Http\Controllers;

use App\Http\Requests\Storetask_userRequest;
use App\Http\Requests\Updatetask_userRequest;
use App\Models\task_user;

class TaskUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Storetask_userRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(task_user $task_user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(task_user $task_user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Updatetask_userRequest $request, task_user $task_user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(task_user $task_user)
    {
        //
    }
}
