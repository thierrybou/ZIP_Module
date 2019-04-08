<?php

class DeleteOldFiles
{
    /**
     * Delete old downloaded zip files
     * @param string $downloadPath
     */
    public function deleteOldDownloadedFiles($downloadPath)
    {
        $fileTab = $this->searchFilesOrDirs($downloadPath);

        if (!empty($fileTab)) {
            $keyToDel = array_search($downloadPath, $fileTab);
            unset($fileTab[$keyToDel]);
            array_map('unlink', $fileTab);
        }
    }

    /**
     * Delete old extracted folders and files
     * @param string $extractPath
     */
    public function deleteOldIPTVFiles($extractPath)
    {
        $directoryTab = $this->searchFilesOrDirs($extractPath);

        if (!empty($directoryTab)) {
            $keyToDel = array_search($extractPath, $directoryTab);
            unset($directoryTab[$keyToDel]);

            foreach ($directoryTab as $directory) {
                $fileTab = glob("$directory/*");
                array_map('unlink', $fileTab);
            }
            array_map('rmdir', $directoryTab);
        }
    }

    /**
     * Search files or directories
     * @param $path
     * @return array
     */
    private function searchFilesOrDirs($path)
    {
        $pattern = str_replace(date("d-m-Y"), '*', $path);
        if (is_dir($path)) {
            $tab = glob($pattern, GLOB_ONLYDIR);
        } else {
            $tab = glob($pattern);
        }
        return $tab;
    }
}