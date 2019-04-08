<?php

class DownloadIPTVZipFile
{
    /**
     * @var string
     */
    protected $zipFile;

    /**
     * @var string
     */
    protected $zipPath;

    /**
     * @var UrlInterface
     */
    private $url;

    public function __construct(UrlInterface $url, $zipPath, $zipFile)
    {
        $this->zipPath        = $zipPath;
        $this->zipFile        = $zipFile;
        $this->url            = $url;
    }

    /**
     * Download the ZIP file related to the url
     * @return string
     */
    public function downloadZipFile()
    {
        $this->assertFileNotExist();

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->url->getUrl());
        curl_setopt($ch, CURLOPT_FAILONERROR, true);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_AUTOREFERER, true);
        curl_setopt($ch, CURLOPT_BINARYTRANSFER,true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_FILE, $this->createEmptyZipFile());
        $page = curl_exec($ch);

        if(!$page) {
            exit("[ERROR] : Unable to scrape the url : $this->url.");
        }
        curl_close($ch);

        return $this->getFullZipPath();
    }

    /**
     * Assert that file to download does not exist on the local machine otherwise exit
     */
    private function assertFileNotExist()
    {
        if (file_exists($this->getFullZipPath())) {
            exit("[STOP] : The file $this->zipFile already exists.");
        }
    }

    /**
     * Concatenate file path and name
     * @return string
     */
    public function getFullZipPath()
    {
        return $this->zipPath.$this->zipFile;
    }

    /**
     * Create an empty ZIP archive
     * @return bool|resource
     */
    private function createEmptyZipFile()
    {
        return fopen($this->zipPath.$this->zipFile, "w");
    }
}