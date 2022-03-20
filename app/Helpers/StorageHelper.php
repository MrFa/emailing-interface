<?php

namespace App\Helpers;

use App\Models\Document;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class StorageHelper
{

    public static  $RANDOM_STRING_LENTH = 20;


    public static function get_document($id)
    {
        $doc = Document::findOrFail($id);
        return Storage::disk('public')->download($doc->file_path, $doc->file_name);
    }


    // file name msut have the extension
    public static function store_document($file_name, $content,$mime_type)
    {
        $new_name = StorageHelper::generate_unique_document_name($file_name);
        Storage::disk('public')->putFileAs('documents/', $content, $new_name);
        $doc = Document::create(
            [
                'file_name' => $file_name,
                'file_path' => 'documents/' . $new_name,
                'mime_type' => $mime_type
            ]
        );
        return $doc->id;
    }

    public static function generate_unique_document_name($file_name)
    {
        do {
            $random = Str::random(StorageHelper::$RANDOM_STRING_LENTH);
            $new_name = $random . "_" . $file_name;
        } while (Storage::disk('public')->exists('documents/' . $new_name));
        return $new_name;
    }

}