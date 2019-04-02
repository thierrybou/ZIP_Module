# ZIP_Module
This module lets you download a ZIP file located at an url and unzip it on your local machine

## Requires
php: >=5.6
You can download it [here](https://www.php.net/downloads.php).

## Windows
Launch the file IPTV_UPDATE_AUTO.bat, the IPTV files will be downloaded and extracted automatically in the previous directory related to .bat file.

## Linux
Launch the command `php index.php` to download and extract the IPTV files or create you a cron to launch it automatically every day. 

### Options
Go to `config/parameters.php` : 

- change the value of `'download.path'` to change the path where the ZIP archive will be downloaded.
- change the value of `'unzip.path'` to change the path where the ZIP archive will be extracted. 

If you want scraped another website url, you have to change these parameters :

- `url.address` => Change by the website url that you want to scrape.
- `url.pattern` => Change by a new pattern that lets you get the `href` url of the ZIP file into the scraped page.
- `url.element` => Change by a css class or id that belong to the `<a class="attachment-link" href="file_to_download.zip">` element in the source code page, this  step is just to verify that the ZIP file still exists on the page. If it no longer exists the the script exit.
