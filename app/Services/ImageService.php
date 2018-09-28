<?php

namespace App\Services;

use Imgix\UrlBuilder;


/**
 * @property mixed $organization
 */
class ImageService
{
    public function buildUrl(string $domain, int $width, int $height, string $fileName) {
        $builder = new UrlBuilder($domain);
        $builder->setUseHttps(true);
        $params = array("w" => $width, "h" => $height);
        return $builder->createURL($fileName, $params);
    }

}
