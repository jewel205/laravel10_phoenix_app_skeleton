<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleFormRequest;
use App\Services\PermissionService;
use App\Services\RoleService;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use DB;

class RoleController extends Controller
{
    protected $roleService;
    protected $permissionService;

    public function __construct(RoleService $roleService, PermissionService $permissionService){
        $this->roleService = $roleService;
        $this->permissionService = $permissionService;

        $this->middleware('can:manage-roles');
    }

    public function index()
    {
        $roles = $this->roleService->getAllRoles();
        return view('access-control.roles.index',['roles' => $roles]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions = $this->permissionService->getAllPermissions();
        return view('access-control.roles.create',['permissions' => $permissions]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoleFormRequest $request)
    {
        $validatedInputs = $request->validated();
        $role = $this->roleService->saveRole($validatedInputs);

        $permissions = $request->input('permissions');
        $data = array();
        foreach ($permissions as $key => $item){
            $data[$key] = (int)$item;
        }
        $role->syncPermissions($data);

        return redirect()->route('roles.index')->with('success','Role created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $role = $this->roleService->getRoleById($id);
        $permissions = $this->permissionService->getAllPermissions();
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)
            ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
            ->all();
        return view('access-control.roles.view',['role' => $role, 'permissions' => $permissions, 'rolePermissions' => $rolePermissions]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $role = $this->roleService->getRoleById($id);
        $permissions = $this->permissionService->getAllPermissions();
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)
            ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
            ->all();
        return view('access-control.roles.edit',['role' => $role, 'permissions' => $permissions, 'rolePermissions' => $rolePermissions]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RoleFormRequest $request, Role $role)
    {
        $validatedInputs = $request->validated();
        $this->roleService->updateRole($validatedInputs, $role->id);

        $permissions = $request->input('permissions');
        $data = array();
        foreach ($permissions as $key => $item){
            $data[$key] = (int)$item;
        }
        $role->syncPermissions($data);

        return redirect()->route('roles.index')->with('success', 'Data update successful.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
