<?php

trait Utils
{
    /**
     * Log a message according to a level given in argument
     * @param $level
     * @param $message
     */
    public static function log($level, $message)
    {
        error_log("[".date("Y-m-d H:m:i")."] $level - $message\n", 3, "log/error.log");
    }
}