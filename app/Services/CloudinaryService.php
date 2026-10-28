<?php

namespace App\Services;

use CURLFile;
use Illuminate\Http\UploadedFile;

class CloudinaryService
{
    /**
     * Upload an image to Cloudinary and return its secure URL.
     *
     * @param UploadedFile|string $file
     * @return string|null
     */
    public static function upload($file): ?string
    {
        $cloudName = env('CLOUDINARY_CLOUD_NAME');
        $apiKey = env('CLOUDINARY_API_KEY');
        $apiSecret = env('CLOUDINARY_API_SECRET');

        if (!$cloudName || !$apiKey || !$apiSecret) {
            return null;
        }

        $timestamp = time();
        $signature = sha1('timestamp=' . $timestamp . $apiSecret);

        if ($file instanceof UploadedFile) {
            $filePath = $file->getRealPath();
            $mimeType = $file->getMimeType();
            $postName = $file->getClientOriginalName();
            $curlFile = new CURLFile($filePath, $mimeType, $postName);
        } elseif (is_string($file)) {
            $curlFile = new CURLFile($file);
        } else {
            return null;
        }

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://api.cloudinary.com/v1_1/{$cloudName}/image/upload");
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, [
            'file' => $curlFile,
            'timestamp' => $timestamp,
            'api_key' => $apiKey,
            'signature' => $signature,
        ]);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec($ch);
        curl_close($ch);

        $data = json_decode($response, true);

        return $data['secure_url'] ?? null;
    }
}
