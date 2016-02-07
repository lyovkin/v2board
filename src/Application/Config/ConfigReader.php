<?php

namespace Application\Config;

/**
 * Config reader util
 * @author cawa
 */
class ConfigReader
{

    /**
     * default config directory
     */
    protected static $defaultPath = "/src/config/";

    /**
     * @static
     * @param string $section
     * Rread section of main array config
     */
    public static function getSection($section)
    {
        return require self::getConfgiPath() .$section. '.php';
    }

    public static function getConfgiPath()
    {
        return BASE_DIR .self::$defaultPath;
    }

}
