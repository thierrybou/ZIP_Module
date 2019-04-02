<?php

/**
 * Array of parameters injected to the different class into the services container
 */
$parameters = [
    'url.class'      => 'Url', // Name of Url PHP Class
    'url.address'    => 'https://www.iptv4sat.com/dl-iptv-france/', // Url of the website to scrape
    'url.pattern'    => '#href="(https://www.iptv4sat.com/download-attachment/[^"]*)"#', // Pattern to find the ZIP url to download
    'url.element'    => 'class="attachment-link"', // HTML or css element to target in the scraped page to get the ZIP url
    'download.class' => 'DownloadIPTVZipFile', // Name of the DownloadIPTVZipFile PHP Class
    'download.path'  => 'j:/Downloads/', // Path to download the ZIP file
    'download.file'  => 'IPTV-FraNce-Gratuit-Playlist-M3u-'. date("d-m-Y") .'.zip', // Name of ZIP file to download
    'unzip.class'    => 'ExtractIPTVZipFile', // Name of the ZIP PHP Class
    'unzip.path'     => '../IPTV-FRANCE_'. date("d-m-Y"), // Path to extract the ZIP file
];