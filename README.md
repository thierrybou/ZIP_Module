# ZIP_Module
This module lets you download a ZIP file located at an url and unzip it on your local machine

## Windows
Launch the file IPTV_UPDATE_AUTO.bat, the IPTV files will be downloaded and extracted automatically in the previous directory related to .bat file.

## Linux
Launch the command `php index.php` to download and extract the IPTV files or create you a cron to launch it automatically every day. 

### Options
Go to `config/parameters.php` : 

- change the value of `'download.path'` to change the path where the ZIP archive will be downloaded.
- change the value of `'unzip.path'` to change the path where the ZIP archive will be extracted. 
