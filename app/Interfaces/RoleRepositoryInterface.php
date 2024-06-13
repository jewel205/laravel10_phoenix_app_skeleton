<?php

namespace App\Interfaces;

interface RoleRepositoryInterface
{
    public function getAll();
    public function getById($id);
    public function getByName($name);
    public function save($data);
    public function update($data, $id);
    public function delete($id);
}
