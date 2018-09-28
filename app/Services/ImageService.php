<?php

namespace App\Services;

use Imgix\UrlBuilder;
use Aws\S3\S3Client;
use League\Flysystem\AwsS3v3\AwsS3Adapter;
use League\Flysystem\Filesystem;


/**
 * @property mixed $organization
 */
class ImageService
{
    /**
     * @param string $fileName
     * @param int $width
     * @param int $height
     * @return string
     */
    public function buildUrl(string $fileName, int $width, int $height)
    {
        $builder = new UrlBuilder(getenv('IMGIX_DOMAIN'));
        $builder->setUseHttps(true);
        $params = array("w" => $width, "h" => $height);
        return $builder->createURL($fileName, $params);
    }

    /**
     * @param string $path
     * @param string $contents
     * @return bool
     * @throws \League\Flysystem\FileExistsException
     */
    public function upload(string $path = "", string $contents = "")
    {
        $filesystem = $this->setupFilesystem();
        return $filesystem->write($path, $contents);
    }

    /**
     * @param string $path
     * @param string $contents
     * @return bool
     * @throws \League\Flysystem\FileNotFoundException
     */
    public function update(string $path = "", string $contents = "")
    {
        $filesystem = $this->setupFilesystem();
        return $filesystem->update($path, $contents);
    }

    /**
     * @param string $path
     * @return bool
     * @throws \League\Flysystem\FileNotFoundException
     */
    public function delete(string $path)
    {
        $filesystem = $this->setupFilesystem();
        return $filesystem->delete($path);
    }

    /**
     * @return Filesystem
     */
    private function setupFilesystem()
    {
        $client = S3Client::factory([
            'credentials' => [
                'key'    => getenv('AWS_ACCESS_KEY'),
                'secret' => getenv('AWS_SECRET_ACCESS_KEY'),
            ],
            'region' => 'us-east-1',
            'version' => 'latest',
        ]);

        $adapter = new AwsS3Adapter($client, 'rescue-app-images');

        return new Filesystem($adapter);
    }
}
