<?php

namespace App\Http\Controllers;

use App\Models\User_Role;
use App\Http\Requests\StoreUser_RoleRequest;
use App\Http\Requests\UpdateUser_RoleRequest;

class UserRoleController extends Controller
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
     * @param  \App\Http\Requests\StoreUser_RoleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUser_RoleRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User_Role  $user_Role
     * @return \Illuminate\Http\Response
     */
    public function show(User_Role $user_Role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User_Role  $user_Role
     * @return \Illuminate\Http\Response
     */
    public function edit(User_Role $user_Role)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUser_RoleRequest  $request
     * @param  \App\Models\User_Role  $user_Role
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUser_RoleRequest $request, User_Role $user_Role)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User_Role  $user_Role
     * @return \Illuminate\Http\Response
     */
    public function destroy(User_Role $user_Role)
    {
        //
    }
}
