<?php

class ExtractIPTVZipFile
{
    /**
     * @var ZipArchive
     */
    private $zipArchive;

    /**
     * @var string
     */
    private $extractPath;

    /**
     * @var DownloadIPTVZipFile
     */
    private $downloadIPTVZipFile;

    public function __construct(DownloadIPTVZipFile $downloadIPTVZipFile, $extractPath)
    {
        $this->zipArchive          = new ZipArchive();
        $this->downloadIPTVZipFile = $downloadIPTVZipFile;
        $this->extractPath         = $extractPath;
    }

    /**
     * Extract the ZIP archive in the specified path of the local machine
     */
    public function extractZipFile()
    {
        $zipDownloaded = $this->downloadIPTVZipFile->downloadZipFile();

        if (!isset($zipDownloaded)) {
            exit('[ERROR] : Fail to extract the ZIP archive ');
        }
        $this->zipArchive->open($zipDownloaded);
        $this->zipArchive->extractTo($this->extractPath);
        $this->zipArchive->close();

        echo "ZIP archive downloaded.";
    }
}