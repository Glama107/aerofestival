<?php

namespace App\Service;

class ImageCompressorService
{
    private const MAX_DIMENSION = 1920;
    private const JPEG_QUALITY = 82;
    private const PNG_COMPRESSION = 6;

    public function compress(string $filePath): void
    {
        if (!is_file($filePath)) {
            return;
        }

        $info = @getimagesize($filePath);
        if (false === $info) {
            return;
        }

        [$width, $height, $type] = $info;

        $image = match ($type) {
            IMAGETYPE_JPEG => imagecreatefromjpeg($filePath),
            IMAGETYPE_PNG => imagecreatefrompng($filePath),
            IMAGETYPE_WEBP => imagecreatefromwebp($filePath),
            default => null,
        };

        if (null === $image) {
            return;
        }

        if ($width > self::MAX_DIMENSION || $height > self::MAX_DIMENSION) {
            $ratio = min(self::MAX_DIMENSION / $width, self::MAX_DIMENSION / $height);
            $newWidth = (int) round($width * $ratio);
            $newHeight = (int) round($height * $ratio);

            $resized = imagecreatetruecolor($newWidth, $newHeight);
            if (IMAGETYPE_PNG === $type) {
                imagealphablending($resized, false);
                imagesavealpha($resized, true);
            }
            imagecopyresampled($resized, $image, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
            imagedestroy($image);
            $image = $resized;
        }

        match ($type) {
            IMAGETYPE_JPEG => imagejpeg($image, $filePath, self::JPEG_QUALITY),
            IMAGETYPE_PNG => imagepng($image, $filePath, self::PNG_COMPRESSION),
            IMAGETYPE_WEBP => imagewebp($image, $filePath, self::JPEG_QUALITY),
            default => null,
        };

        imagedestroy($image);
    }
}
