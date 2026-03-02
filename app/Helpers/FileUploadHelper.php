<?php

namespace App\Helpers;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class FileUploadHelper
{
    public static function upload(UploadedFile $file, string $folder = 'uploads'): bool|string{
        $filename = time() . '_' . uniqid() . '.' . $file->extension();
    return $file->storeAs(path: $folder, name: $filename, options: 'public');
    }

    public static function delete(string $path): bool{
        return Storage::disk(name: 'public')->delete(paths: $path);
    }

    public static function update(UploadedFile $newFile, string $oldPath, string $folder): string | bool{
        if(self::delete(path: $oldPath)){
            return self::upload(file: $newFile, folder: $folder);
        }
        return false;
    }

    public static function uploadMany(array $files, string $folder = 'uploads'): array{
        $paths = [];
        foreach($files as $file){
            $paths[] = self::upload(file: $file, folder: $folder);
        }
        return $paths;
    }
}
