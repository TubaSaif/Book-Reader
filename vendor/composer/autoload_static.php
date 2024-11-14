<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit049f070561fc6bad0200ecc15956ba28
{
    public static $prefixLengthsPsr4 = array (
        'B' => 
        array (
            'BookReader\\' => 11,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'BookReader\\' => 
        array (
            0 => __DIR__ . '/../..' . '/includes',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit049f070561fc6bad0200ecc15956ba28::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit049f070561fc6bad0200ecc15956ba28::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit049f070561fc6bad0200ecc15956ba28::$classMap;

        }, null, ClassLoader::class);
    }
}