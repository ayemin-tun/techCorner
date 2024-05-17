<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;

trait HandleImagesDelete
{
    public static function bootHandleImagesDelete()
    {
        static::deleting(function ($model) {
            self::deleteImages($model->images);
        });

        static::updating(function ($model) {
            if ($model->isDirty('images')) {
                $originalImages = $model->getOriginal('images');
                $currentImages = $model->images;
                self::deleteRemovedImages($originalImages, $currentImages);
            }
        });
    }

    private static function deleteImages($images)
    {
        foreach ($images as $image) {
            $imagePath = 'public/'.$image;
            if (Storage::exists($imagePath)) {
                Storage::delete($imagePath);
            }
        }

    }

    private static function deleteRemovedImages($originalImages, $currentImages)
    {
        $imagesToDelete = array_diff((array) $originalImages, (array) $currentImages);

        foreach ($imagesToDelete as $image) {
            $imagePath = 'public/'.$image;
            if (Storage::exists($imagePath)) {
                Storage::delete($imagePath);
            }
        }
    }
}
