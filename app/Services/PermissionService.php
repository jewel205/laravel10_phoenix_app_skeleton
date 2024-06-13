<?php

namespace App\Services;

use App\Repositories\PermissionRepository;

class PermissionService
{
    protected $permissionRepository;

    public function __construct(PermissionRepository $permissionRepository)
    {
        $this->permissionRepository = $permissionRepository;
    }

    public function getAllPermissions(){
        return $this->permissionRepository->getAll();
    }

    public function getPermissionById($id){
        return $this->permissionRepository->getById($id);
    }

    public function savePermission($data){
        return $this->permissionRepository->save($data);
    }

    public function updatePermission($data, $id){
        return $this->permissionRepository->update($data, $id);
    }

    public function deletePermission($id){
        return $this->permissionRepository->delete($id);
    }
}
