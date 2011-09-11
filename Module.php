<?php

namespace Guestbook;

use InvalidArgumentException,
    RecursiveDirectoryIterator,
    Zend\Loader\AutoloaderFactory,
    Zend\Config\Config;

class Module
{
    public function getConfig($env = null)
    {
        $config = new Config(include __DIR__ . '/configs/guestbook.config.php');
        if (!$env) {
            return $config;
        }
        if (isset($config->$env) && $config->$env instanceof Config) {
            return $config->$env;
        }

        throw new \InvalidArgumentException('Unrecognized environment provided');
    }

    public function init()
    {
        $this->initAutoloader();
    }

    protected function initAutoloader()
    {
        AutoloaderFactory::factory(array(
            'Zend\Loader\ClassMapAutoloader' => array(
                __DIR__ . '/classmap.php',
            )
        ));
    }

    public function getViewScripts()
    {
        return RecursiveDirectoryIterator(__DIR__ . '/views');
    }
}
