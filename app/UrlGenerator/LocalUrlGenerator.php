<?php


namespace App\UrlGenerator;


use Illuminate\Support\Str;
use Spatie\MediaLibrary\Exceptions\UrlCannotBeDetermined;
use Spatie\MediaLibrary\UrlGenerator\LocalUrlGenerator as BaseLocalUrlGenerator;

class LocalUrlGenerator extends BaseLocalUrlGenerator
{

    protected function getBaseMediaDirectoryUrl(): string
    {
        dd($diskUrl = $this->config->get("filesystems.disks.{$this->media->disk}.url"));
        if ($diskUrl = $this->config->get("filesystems.disks.{$this->media->disk}.url")) {
            return $diskUrl;
        }

        if (! Str::startsWith($this->getStoragePath(), public_path())) {
            throw UrlCannotBeDetermined::mediaNotPubliclyAvailable($this->getStoragePath(), public_path());
        }

        return $this->getBaseMediaDirectory();
    }
}
