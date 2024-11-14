<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit049f070561fc6bad0200ecc15956ba28
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        spl_autoload_register(array('ComposerAutoloaderInit049f070561fc6bad0200ecc15956ba28', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit049f070561fc6bad0200ecc15956ba28', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit049f070561fc6bad0200ecc15956ba28::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
