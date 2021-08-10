<?php
namespace Backend\Traits;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

trait StorageImageTrait
{
    public function storageTraitUpload($request, $filedName, $folderName)
    {
        if ($request->hasFile($filedName))
        {
            $file = $request->$filedName;
            $fileNameOrigin = $file->getClientOriginalName();
            $fileNameHash   = Str::random(20) . '.' . $file->getClientOriginalExtension();
            $filePath       = $request->file($filedName)->storeAs('public/' .$folderName, $fileNameHash);
            $dataUploadTrait = [
                'file_name' => $fileNameOrigin,
                'file_path' => Storage::url($filePath)
            ];
            return $dataUploadTrait;
        }
        return null;
    }
    public function fileName($request, $filedName)
    {
        if ($request->hasFile($filedName))
        {
            $file = $request->$filedName;
            $fileNameOrigin = $file->getClientOriginalName();
//            $fileNameHash   = Str::random(20) . '.' . $file->getClientOriginalExtension();
            $dataUploadTrait = [
                'file_name' => $fileNameOrigin,
//                'file_path' => $fileNameHash
            ];
            return $dataUploadTrait;
        }
        return null;
    }
    public function storageTraitUploadMultiple($file, $folderName)
    {
        $fileNameOrigin = $file->getClientOriginalName();
        $fileNameHash   = Str::random(20) . '.' .$file->getClientOriginalExtension();
        $filePath       = $file->storeAs('public/' .$folderName . '/' . auth()->id(), $fileNameHash);
        $dataUploadTrait = [
            'file_name' => $fileNameOrigin,
            'file_path' => Storage::url($filePath)
        ];
        return $dataUploadTrait;
    }
}
