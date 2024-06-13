<?php

namespace App\Repositories;

use App\Interfaces\AttachmentRepositoryInterface;
use App\Models\Attachment;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class AttachmentRepository implements AttachmentRepositoryInterface
{
    protected $attachment;

    public function __construct(Attachment $attachment)
    {
        $this->attachment = $attachment;
    }

    public function getAll()
    {

    }

    public function getById($id)
    {
        // TODO: Implement getById() method.
    }

    public function getAllByMenu($menuCode)
    {
        // TODO: Implement getAllByMenu() method.
    }

    public function getAllByCuisine($cuisineCode)
    {
        // TODO: Implement getAllByCuisine() method.
    }

    public function getAllByCategory($categoryCode)
    {
        // TODO: Implement getAllByCategory() method.
    }

    public function getAllByItem($itemCode)
    {
        // TODO: Implement getAllByItem() method.
    }

    public function save($data)
    {
        $attachment_type = $data['type'];
        $attachmentFile = $data['attachment'];
        $attachmentPath = $attachmentFile->store('attachments', 'public');

        // Manipulate and save the image
        $image = Image::make(storage_path('app/public/' . $attachmentPath));

        // Resize the image based on the attachment type
        switch ($attachment_type) {
            case 'menu-image':
            case 'cuisine-image':
            case 'category-image':
            case 'item-image':
                $image->fit(700, 700);
                break;

            case 'menu-thumbnail':
            case 'cuisine-thumbnail':
            case 'category-thumbnail':
            case 'item-thumbnail':
                $image->fit(180, 180);
                break;
        }
        // Save the manipulated image
        $image->save();

        // Store data in the attachments table
        $attachment = new $this->attachment;
        $this->extracted($data, $attachment, $attachmentPath);
        $attachment->save();

        return $attachment;

    }

    public function update($data, $id)
    {
        // TODO: Implement update() method.
    }

    public function extracted($data, $attachment, $attachmentPath){
        $attachment_type = $data['type'];
        switch ($attachment_type){
            case 'menu-image':
            case 'menu-thumbnail':
                $attachment->type = $data['type'];
                $attachment->menu_code = $data['menu_code'];
                $attachment->path = $attachmentPath;
                break;

            case 'cuisine-image':
            case 'cuisine-thumbnail':
                $attachment->type = $data['type'];
                $attachment->cuisine_code = $data['cuisine_code'];
                $attachment->path = $attachmentPath;
                break;

            case 'category-image':
            case 'category-thumbnail':
                $attachment->type = $data['type'];
                $attachment->category_code = $data['category_code'];
                $attachment->path = $attachmentPath;
                break;

            case 'item-image':
            case 'item-thumbnail':
                $attachment->type = $data['type'];
                $attachment->item_code = $data['item_code'];
                $attachment->path = $attachmentPath;
                break;
        }
    }

    public function getThumbnailImage($code, $type)
    {
        return match ($type) {
            'item-thumbnail' => $this->attachment
                    ->where('type', 'item-thumbnail')
                    ->where('item_code', $code)
                    ->first() ?? $this->attachment
                    ->where('type', 'no-image')
                    ->first(),
            'menu-thumbnail' => $this->attachment
                    ->where('type', 'menu-thumbnail')
                    ->where('menu_code', $code)
                    ->first() ?? $this->attachment
                    ->where('type', 'no-image')
                    ->first(),
            'cuisine-thumbnail' => $this->attachment
                    ->where('type', 'cuisine-thumbnail')
                    ->where('cuisine_code', $code)
                    ->first() ?? $this->attachment
                    ->where('type', 'no-image')
                    ->first(),
            'category-thumbnail' => $this->attachment
                    ->where('type', 'category-thumbnail')
                    ->where('menu_code', $code)
                    ->first() ?? $this->attachment
                    ->where('type', 'no-image')
                    ->first(),
            default => null,
        };
    }



    public function getImages($code, $type){
        return match ($type) {
            'item-image' => $this->attachment
                ->where('type', 'item-image')
                ->where('item_code', $code)
                ->get(),
            'menu-image' => $this->attachment
                ->where('type', 'menu-image')
                ->where('menu_code', $code)
                ->get(),
            'cuisine-image' => $this->attachment
                ->where('type', 'cuisine-image')
                ->where('cuisine_code', $code)
                ->get(),
            'category-image' => $this->attachment
                ->where('type', 'category-image')
                ->where('menu_code', $code)
                ->get(),
            default => null,
        };
    }

    public function removeImage($id){
        $image = $this->attachment->whereKey($id)->first();
        dd($image);

        // Delete image file from storage
        Storage::delete('public/' . $image->path);

        // Delete images from database
        return $image->delete();
    }

    public function removeAllImagesByItem($item){
        $images = $this->attachment
            ->where('item_code', $item)
            ->where('type', 'item-image')
            ->get();

        foreach ($images as $image) {
            // Delete image file from storage
            Storage::delete('public/' . $image->path);
        }

        // Delete images from database
        return $this->attachment
            ->where('item_code', $item)
            ->where('type', 'item-image')
            ->delete();
    }

    public function removeAllImagesByMenu($menu){
        $images = $this->attachment
            ->where('menu_code',$menu)
            ->where('type','menu-image')
            ->get();

        foreach ($images as $image) {
            // Delete image file from storage
            Storage::delete('public/' . $image->path);
        }

        // Delete images from database
        return $this->attachment
            ->where('menu_code',$menu)
            ->where('type','menu-image')
            ->delete();

    }

    public function removeAllImagesByCuisine($cuisine){
        $images = $this->attachment
            ->where('cuisine_code',$cuisine)
            ->where('type','cuisine-image')
            ->get();

        foreach ($images as $image) {
            // Delete image file from storage
            Storage::delete('public/' . $image->path);
        }

        // Delete images from database
        return $this->attachment
            ->where('cuisine_code',$cuisine)
            ->where('type','cuisine-image')
            ->delete();
    }

    public function removeThumbnail($id){

    }
}
