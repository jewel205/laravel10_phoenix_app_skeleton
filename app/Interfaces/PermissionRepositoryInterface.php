<?php

namespace App\Interfaces;

interface PermissionRepositoryInterface
{
    public function getAll();
    public function getById($id);
    public function save($data);
    public function update($data, $id);
    public function delete($id);
}
