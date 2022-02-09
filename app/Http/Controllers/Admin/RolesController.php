<?php

namespace App\Http\Controllers\Admin;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreRolesRequest;
use App\Http\Requests\Admin\UpdateRolesRequest;
use Illuminate\Support\Facades\Session;
class RolesController extends Controller
{
    /**
     * Display a listing of Role.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // if (! Gate::allows('users_manage')) {
        //     return abort(401);
        // }

        $roles = Role::all();
        $permissions = Permission::get()->pluck('name', 'name');
        return view('admin.role.roles.index', compact('roles'), compact('permissions'));
    }

    /**
     * Show the form for creating new Role.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $permissions = Permission::get()->pluck('name', 'name');

        return view('admin.role.roles.index', compact('permissions'));
    }

    /**
     * Store a newly created Role in storage.
     *
     * @param  \App\Http\Requests\StoreRolesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRolesRequest $request)
    {
        // if (! Gate::allows('users_manage')) {
        //     return abort(401);
        // }
        $validation = $request->validate([
            'name'=>'required|unique:roles',
        ],[

            'name.unique' => 'Tên vai trò đã được sử dụng',

        ]);
        $role = Role::create($request->except('permission'));
        $permissions = $request->input('permission') ? $request->input('permission') : [];
        $role->givePermissionTo($permissions);
        Session::flash('alert-info', 'Thêm mới thành công ^^~!!!');
        return redirect()->route('admin.roles.index');
    }


    /**
     * Show the form for editing Role.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        // if (! Gate::allows('users_manage')) {
        //     return abort(401);
        // }
        $permissions = Permission::get()->pluck('name', 'name');

        return view('admin.role.roles.edit', compact('role', 'permissions'));
    }

    /**
     * Update Role in storage.
     *
     * @param  \App\Http\Requests\UpdateRolesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRolesRequest $request, Role $role)
    {
        // if (! Gate::allows('users_manage')) {
        //     return abort(401);
        // }

        $role->update($request->except('permission'));
        $permissions = $request->input('permission') ? $request->input('permission') : [];
        $role->syncPermissions($permissions);
        Session::flash('alert-info', 'Cập nhật thành công ^^~!!!');
        return redirect()->route('admin.roles.index');
    }

    public function show(Role $role)
    {


        $role->load('permissions');

        return view('admin.role.roles.show', compact('role'));
    }


    /**
     * Remove Role from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        // if (! Gate::allows('users_manage')) {
        //     return abort(401);
        // }

        $role->delete();
        Session::flash('alert-info', 'Xóa thành công ^^~!!!');
        return redirect()->route('admin.roles.index');
    }

    /**
     * Delete all selected Role at once.
     *
     * @param Request $request
     */


}
