<?php

namespace App\Http\Controllers;

use App\Http\Requests\PermissionFormRequest;
use Spatie\Permission\Models\Permission;
use App\Services\PermissionService;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    protected $permissionService;

    public function __construct(PermissionService $permissionService){
        $this->permissionService = $permissionService;

        $this->middleware('can:manage-permissions');
    }
    public function index()
    {
        $permissions = $this->permissionService->getAllPermissions();
        return view('access-control.permissions.index',['permissions' => $permissions]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('access-control.permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PermissionFormRequest $request)
    {
        $validatedInputs = $request->validated();
        $this->permissionService->savePermission($validatedInputs);
        return redirect()->route('permissions.index')->with('success','Permission created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $permission = $this->permissionService->getPermissionById($id);
        return view('access-control.permissions.edit',['permission' => $permission]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PermissionFormRequest $request, Permission $permission)
    {
        $validatedInputs = $request->validated();
        $this->permissionService->updatePermission($validatedInputs, $permission->id);
        return redirect()->route('permissions.index')->with('success','Data update successful.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

    }

    public function remove($id){
        $permission = $this->permissionService->getPermissionById($id);
        $this->permissionService->deletePermission($id);
        return redirect()->route('permissions.index')->with('trashed','Permission "' .$permission->name. '" removed.');
    }
}
