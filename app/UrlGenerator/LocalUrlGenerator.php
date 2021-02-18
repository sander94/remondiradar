<?php


namespace App\UrlGenerator;


use Illuminate\Support\Str;
use Spatie\MediaLibrary\Exceptions\UrlCannotBeDetermined;
use Spatie\MediaLibrary\UrlGenerator\LocalUrlGenerator as BaseLocalUrlGenerator;

class LocalUrlGenerator extends BaseLocalUrlGenerator
{
    /**
     * Get the url for a media item.
     *
     * @return string
     *
     * @throws \Spatie\MediaLibrary\Exceptions\UrlCannotBeDetermined
     */
    public function getUrl(): string
    {
        $url = $this->getBaseMediaDirectoryUrl().'/'.$this->getPathRelativeToRoot();

        $url = $this->makeCompatibleForNonUnixHosts($url);

        $url = $this->rawUrlEncodeFilename($url);

        $url = $this->versionUrl($url);

        return $url;
    }

    protected function getBaseMediaDirectoryUrl(): string
    {
        dd($this->media);
        if ($diskUrl = $this->config->get("filesystems.disks.{$this->media->disk}.url")) {
            return $diskUrl;
        }

        if (! Str::startsWith($this->getStoragePath(), public_path())) {
            throw UrlCannotBeDetermined::mediaNotPubliclyAvailable($this->getStoragePath(), public_path());
        }

        return $this->getBaseMediaDirectory();
    }
}
