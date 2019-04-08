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
    public $extractPath;

    /**
     * @var DownloadIPTVZipFile
     */
    private $downloadIPTVZipFile;

    /**
     * @var DeleteOldFiles
     */
    private $deleteOldFiles;

    /**
     * @var int
     */
    private $delOldFilesParam;

    public function __construct
    (
        DownloadIPTVZipFile $downloadIPTVZipFile,
        DeleteOldFiles $deleteOldFiles,
        $extractPath,
        $delOldFilesParam
    )
    {
        $this->zipArchive          = new ZipArchive();
        $this->downloadIPTVZipFile = $downloadIPTVZipFile;
        $this->deleteOldFiles      = $deleteOldFiles;
        $this->extractPath         = $extractPath;
        $this->delOldFilesParam    = $delOldFilesParam;
    }

    /**
     * Extract the ZIP archive in the specified path of the local machine
     */
    public function extractZipFile()
    {
        $zipDownloaded = $this->downloadIPTVZipFile->downloadZipFile();

        if (!isset($zipDownloaded)) {
            Utils::log("ERROR", "Fail to extract the ZIP archive");
            exit('[ERROR] : Fail to extract the ZIP archive');
        }
        $this->zipArchive->open($zipDownloaded);
        $this->zipArchive->extractTo($this->extractPath);
        $this->zipArchive->close();

        Utils::log("INFO", "ZIP archive downloaded");

        if ($this->delOldFilesParam) {
            $this->deleteOldFiles->deleteOldDownloadedFiles($this->downloadIPTVZipFile->getFullZipPath());
            $this->deleteOldFiles->deleteOldIPTVFiles($this->extractPath);
            Utils::log("INFO", "Old files deleted");
        }
    }
}