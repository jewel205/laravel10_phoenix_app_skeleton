<?php

namespace App\Repositories;

use App\Interfaces\UserRepositoryInterface;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class UserRepository implements UserRepositoryInterface
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getAll()
    {
        $userRole = Auth::user()->roles->first()->name;
        if ($userRole == 'Admin'){
            return $this->user->all();
        }
        else
            return $this->getAllExceptAdmin();

    }

    public function getAllExceptAdmin()
    {
        return $this->user->whereDoesntHave('roles', function ($query) {
           $query->whereIn('name', ['Admin', 'Superuser']);
        })->get();
    }

    public function getById($id)
    {
        return $this->user->findOrFail($id);
    }

    public function save($data)
    {
        $user = new $this->user;
        $this->extracted($data, $user);

        $user->save();
        return $user->fresh();
    }

    public function saveUserThumbnail($userThumbnailData){
        $user = $this->getById($userThumbnailData['user_id']);
        $attachmentFile = $userThumbnailData['user_thumbnail'];
        $attachmentPath = $attachmentFile->store('user-thumbnails', 'public');

        //      Manipulate and save the image
        $image = Image::make(storage_path('app/public/' . $attachmentPath));
        $image->fit(150,150);
        $image->save();

        //        update the avater_path field in users table
        $user->avater_path = $attachmentPath;
        $user->update();
    }

    public function updateUserThumbnail($userThumbnailData){
        $user = $this->getById($userThumbnailData['user_id']);
        $attachmentFile = $userThumbnailData['user_thumbnail'];
        $attachmentPath = $attachmentFile->store('user-thumbnails', 'public');

        //        Remove existing image if any
        if (!is_null($user->avater_path)){
            // Delete image file from storage
            Storage::delete('public/' . $user->avater_path);
        }

        //      Manipulate and save the image
        $image = Image::make(storage_path('app/public/' . $attachmentPath));
        $image->fit(150,150);
        $image->save();

        //        update the avater_path field in users table
        $user->avater_path = $attachmentPath;
        $user->update();
    }

    public function update($data, $id)
    {
        $user = $this->getById($id);
        $this->extractedEdit($data, $user);

        return $user->update();
    }

    public function delete($id)
    {
        $user = $this->getById($id);
        return $user->delete();
    }

    public function statusChange($id)
    {
        $user = $this->getById($id);
        if (!$user->hasRole('Admin')){
            if ($user->is_active == 0){
                $user->is_active = 1;
                return $user->update();
            }
            else{
                $user->is_active = 0;
                return $user->update();
            }
        }
        else{
            if ($user == Auth::user()){
                $error = 'Session running! User cannot be deactivated';
            }
            else
                $error = 'Admin user cannot be deactivated';
        }
          return $error;
    }

    public function passwordChange($id, $password){
        $user = $this->getById($id);
        $user->password = Hash::make($password);
        return $user->update();
    }

    public function ownPasswordChange($id, $oldPassword, $newPassword){
        $user = $this->getById($id);
        if (Hash::check($oldPassword, $user->password)){
            $user->password = Hash::make($newPassword);
            return $user->update();
        }
        else
            return false;
    }

    public function extracted($data, $user){
        $user->name = $data['name'];
        $user->username = strtok($data['email'], '@');
        $user->email = $data['email'];
        $user->phone = $data['phone'];
        $user->password = Hash::make($data['password']);
        $user->is_active = $data['is_active'];
    }

    public function extractedEdit($data, $user){
        $user->name = $data['name'];
        $user->username = strtok($data['email'], '@');
        $user->email = $data['email'];
        $user->phone = $data['phone'];
        $user->is_active = $data['is_active'];
    }
}
