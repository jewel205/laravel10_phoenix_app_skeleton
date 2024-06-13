<?php

namespace App\Interfaces;

interface UserRepositoryInterface
{
    public function getAll();
    public function getAllExceptAdmin();
    public function getById($id);
    public function save($data);
    public function update($data, $id);
    public function delete($id);
    public function statusChange($id);
}
