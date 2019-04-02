<?php

class Url implements UrlInterface
{
    /**
     * @var string
     */
    private $url;

    /**
     * @var string
     */
    private $pattern;

    /**
     * @var string
     */
    private $element;

    public function __construct($url, $pattern, $element)
    {
        $this->url     = $url;
        $this->pattern = $pattern;
        $this->element = $element;
    }

    /**
     * Get the url of the ZIP file
     * @return string
     */
    public function getUrl()
    {
        return $this->parseUrl();
    }

    /**
     * Parse the url according to the pattern located in the parameters file
     * @return mixed
     */
    private function parseUrl()
    {
        if (strpos($this->getDataByScrapeUrl(), $this->element)) {
            preg_match($this->pattern, $this->getDataByScrapeUrl(), $matches);
        } else {
            exit("[WARNING] : Neither css class name : .");
        }
        return $matches[1];
    }

    /**
     * Scrape all data of the url
     * @return bool|string
     */
    private function getDataByScrapeUrl()
    {
        return file_get_contents($this->url);
    }
}