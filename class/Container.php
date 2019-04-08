<?php

class Container
{
    /**
     * @var array
     */
    protected $parameters;

    public function __construct(array $parameters)
    {
        $this->parameters = $parameters;
    }

    /**
     * Return an instance of the Url Class
     * @return Url
     */
    public function getUrlOfZip()
    {
        static $instance;
        if (!isset($instance)) {
            $className = $this->parameters['url.class'];
            $instance = new $className
            (
                $this->parameters['url.address'],
                $this->parameters['url.pattern'],
                $this->parameters['url.element']
            );
        }

        return $instance;
    }

    /**
     * Return an instance of the DownloadIPTVZipFile Class
     * @return DownloadIPTVZipFile
     */
    public function downloadZip()
    {
        static $instance;
        if (!isset($instance)) {
            $className = $this->parameters['download.class'];
            $instance = new $className
            (
                $this->getUrlOfZip(),
                $this->parameters['download.path'],
                $this->parameters['download.file']
            );
        }

        return $instance;
    }

    /**
     * Return an instance of the ExtractIPTVZipFile Class
     * @return ExtractIPTVZipFile
     */
    public function unzip()
    {
        static $instance;
        if (!isset($instance)) {
            $className = $this->parameters['unzip.class'];
            $instance = new $className
            (
                $this->downloadZip(),
                $this->deleteOldFiles(),
                $this->parameters['unzip.path'],
                $this->parameters['unzip.delete']
            );
        }

        return $instance;
    }

    /**
     * Return an instance of the DeleteOldFiles Class
     * @return mixed
     */
    public function deleteOldFiles()
    {
        static $instance;
        if (!isset($instance)) {
            $className = $this->parameters['delete.class'];
            $instance = new $className();
        }

        return $instance;
    }
}