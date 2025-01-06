<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class ImageService
{
    public static function upload(UploadedFile $image, $folder, $oldImageName = null)
    {
        if ($oldImageName) {
            Storage::disk('public_files')->delete("assets/images/{$folder}/{$oldImageName}");
        }

        $imageName = uniqid('img_') . '.' . $image->getClientOriginalExtension();
        Storage::disk('public_files')->put("assets/images/{$folder}/{$imageName}", File::get($image));

        return $imageName;
    }

    // public static function uploadVideo(UploadedFile $video, $folder, $oldVideoName = null)
    // {
    //     if ($oldVideoName) {
    //         Storage::disk('public_files')->delete("assets/videos/{$folder}/{$oldVideoName}");
    //     }

    //     $videoName = uniqid('img_') . '.' . $video->getClientOriginalExtension();
    //     Storage::disk('public_files')->put("assets/videos/{$folder}/{$videoName}", File::get($video));

    //     return $videoName;
    // }
}
