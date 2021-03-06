<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitba5417534756a69ecfc91e3af7258bb0
{
    public static $prefixLengthsPsr4 = array (
        'F' => 
        array (
            'Faker\\' => 6,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Faker\\' => 
        array (
            0 => __DIR__ . '/..' . '/fzaninotto/faker/src/Faker',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitba5417534756a69ecfc91e3af7258bb0::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitba5417534756a69ecfc91e3af7258bb0::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitba5417534756a69ecfc91e3af7258bb0::$classMap;

        }, null, ClassLoader::class);
    }
}
