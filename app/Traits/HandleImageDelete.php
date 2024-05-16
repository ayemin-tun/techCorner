<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;

trait HandleImageDelete
{
    public static function bootHandleImageDelete()
    {
        static::deleting(function ($model) {
            if ($model->image) {
                $imagePath = 'public/'.$model->image;
                if (Storage::exists($imagePath)) {
                    Storage::delete($imagePath);
                }
            }
        });

        static::updating(function ($model) {
            if ($model->isDirty('image')) {
                $originalImage = $model->getOriginal('image');

                // If there's an original image and it exists in storage, delete it
                if ($originalImage) {
                    $originalImagePath = 'public/'.$originalImage;
                    if (Storage::exists($originalImagePath)) {
                        Storage::delete($originalImagePath);
                    }
                }
            }
        });
    }
}
