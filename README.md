# ZIP_Module
This module scrapes a website url then lets you to download a ZIP file located in this scraped page and unzip it on your local machine

## Requires
php: >=5.6
You can download it [here](https://www.php.net/downloads.php).

## Windows
Launch the file IPTV_UPDATE_AUTO.bat, the IPTV files will be downloaded and extracted automatically in the previous directory related to .bat file.
If you want update automatically the IPTV files at every boot of your machine, you can create a shortcut of the .bat file and place it in the `C:\ProgramData\Microsoft\Windows\Start Menu\Programs\Startup` directory.

## Linux
Launch the command `php index.php` to download and extract the IPTV files or create a cron to launch it automatically every day. 

### Options
Go to `config/parameters.php` : 

- change the value of `'download.path'` to change the path where the ZIP archive will be downloaded.
- change the value of `'unzip.path'` to change the path where the ZIP archive will be extracted.
- change the value of `'unzip.delete'` to 0 to delete previous downloaded and extracted files that you already have. 

If you want scraped another website url, you have to change these parameters :

- `url.address` => Change by the website url that you want to scrape.
- `url.pattern` => Change by a new pattern that lets you get the `href` url of the ZIP file into the scraped page.
- `url.element` => Change by a css class or id that belong to the `<a class="attachment-link" href="file_to_download.zip">` element in the source code page, this  step is just to verify that the ZIP file still exists on the page. If it no longer exists the the script exit.
