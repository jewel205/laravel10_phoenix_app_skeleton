<?php

namespace App\Services;

use App\Repositories\RoleRepository;

class RoleService
{
    protected $roleRepository;

    public function __construct(RoleRepository $roleRepository)
    {
        $this->roleRepository = $roleRepository;
    }

    public function getAllRoles(){
        return $this->roleRepository->getAll();
    }

    public function getRoleById($id){
        return $this->roleRepository->getById($id);
    }

    public function saveRole($data){
        return $this->roleRepository->save($data);
    }

    public function updateRole($data, $id){
        return $this->roleRepository->update($data, $id);
    }

    public function deleteRole($id){
        return $this->roleRepository->delete($id);
    }
}
