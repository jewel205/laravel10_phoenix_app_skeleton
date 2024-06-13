<?php

namespace App\Repositories;

use App\Interfaces\PermissionRepositoryInterface;
use Spatie\Permission\Models\Permission;

class PermissionRepository implements PermissionRepositoryInterface
{
    protected $permission;

    public function __construct(Permission $permission)
    {
        $this->permission = $permission;
    }

    public function getAll()
    {
        return $this->permission->all();
    }

    public function getById($id)
    {
        return $this->permission->findOrFail($id);
    }

    public function save($data)
    {
        $permission = new $this->permission;
        $this->extracted($data, $permission);
        $permission->save();
        return $permission->fresh();
    }

    public function update($data, $id)
    {
        $permission = $this->getById($id);
        $this->extracted($data, $permission);
        return $permission->update();
    }

    public function delete($id)
    {
        $permission = $this->getById($id);
        return $permission->delete();
    }

    public function extracted($data, $permission){
        $permission->name = $data['name'];
        $permission->guard_name = $data['guard_name'];
    }
}
