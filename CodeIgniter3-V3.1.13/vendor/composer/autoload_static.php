<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitd7b658402277efd563cbb2613326843f
{
    public static $prefixLengthsPsr4 = array (
        'c' => 
        array (
            'chriskacerguis\\RestServer\\' => 26,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'chriskacerguis\\RestServer\\' => 
        array (
            0 => __DIR__ . '/..' . '/chriskacerguis/codeigniter-restserver/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitd7b658402277efd563cbb2613326843f::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitd7b658402277efd563cbb2613326843f::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitd7b658402277efd563cbb2613326843f::$classMap;

        }, null, ClassLoader::class);
    }
}
