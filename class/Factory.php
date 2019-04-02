<?php

class Factory
{
    public function generateIPTVFiles(Container $c)
    {
        return $c->unzip()->extractFileZip();
    }
}