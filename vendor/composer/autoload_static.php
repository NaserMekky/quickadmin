<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInita22cc7129c5500ea81eb50e06d9b56ef
{
    public static $prefixLengthsPsr4 = array (
        'N' => 
        array (
            'Nasermekky\\Quickadmin\\' => 22,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Nasermekky\\Quickadmin\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInita22cc7129c5500ea81eb50e06d9b56ef::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInita22cc7129c5500ea81eb50e06d9b56ef::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInita22cc7129c5500ea81eb50e06d9b56ef::$classMap;

        }, null, ClassLoader::class);
    }
}