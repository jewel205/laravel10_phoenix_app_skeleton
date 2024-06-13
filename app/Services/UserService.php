<?php

namespace App\Services;

use App\Repositories\UserRepository;

class UserService
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getAllUsers(){
        return $this->userRepository->getAll();
    }

    public function saveUser($data){
        return $this->userRepository->save($data);
    }

    public function saveUserThumbnail($userThumbnailData){
        return $this->userRepository->saveUserThumbnail($userThumbnailData);
    }

    public function updateUserThumbnail($userThumbnailData){
        return $this->userRepository->updateUserThumbnail($userThumbnailData);
    }

    public function getUserById($id){
        return $this->userRepository->getById($id);
    }

    public function updateUser($data, $id){
        return $this->userRepository->update($data, $id);
    }

    public function deleteUser($id){
        return $this->userRepository->delete($id);
    }

    public function userStatusChange($id){
        return $this->userRepository->statusChange($id);
    }

    public function userPasswordChange($id, $password){
        return $this->userRepository->passwordChange($id, $password);
    }

    public function ownPasswordChange($id, $oldPassword, $newPassword){
        return $this->userRepository->ownPasswordChange($id, $oldPassword, $newPassword);
    }


}
