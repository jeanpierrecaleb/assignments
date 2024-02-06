<?php

namespace App\Http\Controllers\admin;
use Spatie\Permission\Models\Permission;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class PermissionController extends Controller
{
    //

    public function index(){


        $permissions = Permission::all();

        return view('admin.permissions.index', compact('permissions'));


    }


    public function create()
    {
        return view('admin.permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
           // 'name' => 'required|unique:users,name'
           'name' => 'required'
        ]);

        Permission::create($validated);

        return redirect()->route('admin.permissions.index')
            ->withSuccess(__('Permission created successfully.'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Permission  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission)
    {
        $roles = Role::all();
        return view('admin.permissions.edit', compact('permission', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Permission $permission)
    {
        $validated = $request->validate([
            'name' => 'required'
        ]);

        $permission->update($validated);

        return redirect()->route('admin.permissions.index')
            ->withSuccess(__('Permission updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        $permission->delete();

        return redirect()->route('admin.permissions.index')
            ->withSuccess(__('Permission deleted successfully.'));


    }

    public function delete($id)
    {

        $permission = Permission::find($id);

        $permission->delete();

        return redirect('admin.permissions.index')->with("success", "Permission deleted successfully");
    }


    public function assignRole(Request $request, Permission $permission){
        if($permission->hasRole($request->role)){
            return back()->with('message', 'Role exists');
        }

        $permission->assignRole($request->role);
        return back()->with('message', 'Role assigned');



    }

    public function removeRole(Permission $permission, Role $role){
        if($permission->hasRole($role)){
            $permission->removeRole($role);
            return back()->with('message', 'Role removed');
        }


        return back()->with('message', 'Role not exists');



    }




}

