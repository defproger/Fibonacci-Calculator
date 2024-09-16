<?php

namespace App\Helpers;

class Config
{
    public static function get($key)
    {
        $keys = explode('.', $key);
        $configFile = $keys[0];

        if (file_exists(__DIR__ . "/../../config/{$configFile}.php")) {
            $config = include(__DIR__ . "/../../config/{$configFile}.php");
            array_shift($keys);

            foreach ($keys as $subKey) {
                if (isset($config[$subKey])) {
                    $config = $config[$subKey];
                } else {
                    return null;
                }
            }

            return $config;
        }

        return null;
    }
}