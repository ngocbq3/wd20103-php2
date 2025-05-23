<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit68ca98374925fab46bf8e757a845ce0e
{
    public static $prefixLengthsPsr4 = array (
        'e' => 
        array (
            'eftec\\bladeone\\' => 15,
        ),
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'eftec\\bladeone\\' => 
        array (
            0 => __DIR__ . '/..' . '/eftec/bladeone/lib',
        ),
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $prefixesPsr0 = array (
        'B' => 
        array (
            'Bramus' => 
            array (
                0 => __DIR__ . '/..' . '/bramus/router/src',
            ),
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit68ca98374925fab46bf8e757a845ce0e::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit68ca98374925fab46bf8e757a845ce0e::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInit68ca98374925fab46bf8e757a845ce0e::$prefixesPsr0;
            $loader->classMap = ComposerStaticInit68ca98374925fab46bf8e757a845ce0e::$classMap;

        }, null, ClassLoader::class);
    }
}
