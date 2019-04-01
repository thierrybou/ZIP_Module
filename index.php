<?php

require 'autoloader.php';
require 'config/parameters.php';

Autoloader::register();

$c = new Container($parameters);
$c->unzip()->extractZipFile();