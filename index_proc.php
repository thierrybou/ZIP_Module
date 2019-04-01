<?php
/**
 * Created by PhpStorm.
 * User: Thierry
 * Date: 31/03/2019
 * Time: 22:39
 */

$url     = "https://www.iptv4sat.com/dl-iptv-france/";
$data    = file_get_contents($url);
$matches = "no data";

if (strpos($data, "class=\"attachment-link\"")) {
    preg_match('#href="(https://www.iptv4sat.com/download-attachment/[^"]*)"#', $data, $matches);
}

$url = $matches[1];
$zipFile = "j:/Downloads/IPTV-FraNce-Gratuit-Playlist-M3u-". date('d-m-Y').".zip"; // Local Zip File Path
$zipResource = fopen($zipFile, "w");
// Get The Zip File From Server
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_FAILONERROR, true);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_AUTOREFERER, true);
curl_setopt($ch, CURLOPT_BINARYTRANSFER,true);
curl_setopt($ch, CURLOPT_TIMEOUT, 10);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_FILE, $zipResource);
$page = curl_exec($ch);
if(!$page) {
    echo "Error :- ".curl_error($ch);
}
curl_close($ch);


/* Open the Zip file */
$zip = new ZipArchive;
$extractPath = "IPTV-FRANCE_". date('d-m-Y');
if($zip->open($zipFile) != "true"){
    echo "Error :- Unable to open the Zip File";
}
/* Extract Zip File */
$zip->extractTo($extractPath);
$zip->close();