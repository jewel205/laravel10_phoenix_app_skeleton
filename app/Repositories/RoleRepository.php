<?php

namespace App\Repositories;

use App\Interfaces\RoleRepositoryInterface;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;

class RoleRepository implements RoleRepositoryInterface
{
    protected $role;
    public function __construct(Role $role)
    {
        $this->role = $role;
    }

    public function getAll()
    {
        $userRole = Auth::user()->roles->first()->name;
        if ($userRole == 'Admin'){
            return $this->role->all();
        }
        else
            return $this->getAllExceptAdmin();
    }

    public function getAllExceptAdmin(){
        return $this->role->whereNotIn('name',['Admin', 'Superuser'])->get();
    }

    public function getById($id)
    {
        return $this->role->findOrFail($id);
    }

    public function getByName($name)
    {
        return $this->role->where('name',$name)->get();
    }

    public function save($data)
    {
        $role = new $this->role;
        $this->extracted($data, $role);
        $role->save();
        return $role->fresh();
    }

    public function update($data, $id)
    {
        $role = $this->getById($id);
        $this->extracted($data, $role);
        return $role->update();
    }

    public function delete($id)
    {
        $role = $this->getById($id);
        return $role->delete();
    }

    public function extracted($data, $role){
        $role->name = $data['name'];
        $role->guard_name = $data['guard_name'];
    }
}
