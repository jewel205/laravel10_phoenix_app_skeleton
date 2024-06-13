<?php

namespace App\Services;

use App\Repositories\AttachmentRepository;

class AttachmentService
{
    protected $attachmentRepository;

    public function __construct(AttachmentRepository $attachmentRepository)
    {
        $this->attachmentRepository = $attachmentRepository;
    }

    public function saveItemThumbnail($data){
        $thumbnailData = [
            'type' => 'item-thumbnail',
            'item_code' => $data['item_code'],
            'attachment' => $data['item_thumbnail'],
        ];

        return $this->attachmentRepository->save($thumbnailData);
    }

    public function saveItemImages($data){
        $imageData = [];
        $imageData = [
            'type' => 'item-image',
            'item_code' => $data['item_code'],
            'attachment' => $data['item_image'],
        ];
        return $this->attachmentRepository->save($imageData);
    }

    public function saveMenuThumbnail($data){
        $thumbnailData = [
            'type' => 'menu-thumbnail',
            'menu_code' => $data['menu_code'],
            'attachment' => $data['menu_thumbnail'],
        ];

        return $this->attachmentRepository->save($thumbnailData);
    }

    public function saveMenuImages($data){
        $imageData = [];
        $imageData = [
            'type' => 'menu-image',
            'menu_code' => $data['menu_code'],
            'attachment' => $data['menu_image'],
        ];
        return $this->attachmentRepository->save($imageData);
    }

    public function saveCuisineThumbnail($data){
        $thumbnailData = [
            'type' => 'cuisine-thumbnail',
            'cuisine_code' => $data['cuisine_code'],
            'attachment' => $data['cuisine_thumbnail'],
        ];

        return $this->attachmentRepository->save($thumbnailData);
    }

    public function saveCuisineImages($data){
        $imageData = [];
        $imageData = [
            'type' => 'cuisine-image',
            'cuisine_code' => $data['cuisine_code'],
            'attachment' => $data['cuisine_image'],
        ];
        return $this->attachmentRepository->save($imageData);
    }

    public function saveCategoryThumbnail($data){
        $thumbnailData = [
            'type' => 'category-thumbnail',
            'category_code' => $data['category_code'],
            'attachment' => $data['item_thumbnail'],
        ];

        return $this->attachmentRepository->save($thumbnailData);
    }

    public function saveCategoryImages($data){
        $imageData = [];
        $imageData = [
            'type' => 'category-image',
            'category_code' => $data['category_code'],
            'attachment' => $data['item_image'],
        ];
        return $this->attachmentRepository->save($imageData);
    }


    public function getThumbnailImage($code, $type){
        return $this->attachmentRepository->getThumbnailImage($code, $type);
    }

    public function getImages($code, $type){
        return $this->attachmentRepository->getImages($code, $type);
    }

    public function removeImage($id){
        return $this->attachmentRepository->removeImage($id);
    }

    public function removeAllImagesByItem($item){
        return $this->attachmentRepository->removeAllImagesByItem($item);
    }

    public function removeAllImagesByMenu($menu){
        return $this->attachmentRepository->removeAllImagesByMenu($menu);
    }

    public function removeAllImagesByCuisine($cuisine){
        return $this->attachmentRepository->removeAllImagesByCuisine($cuisine);
    }
}
