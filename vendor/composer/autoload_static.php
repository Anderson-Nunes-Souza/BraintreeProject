<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitdf66356ccc3b955090a7e8680db260f4
{
    public static $prefixLengthsPsr4 = array (
        'B' => 
        array (
            'Braintree\\' => 10,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Braintree\\' => 
        array (
            0 => __DIR__ . '/..' . '/braintree/braintree_php/lib/Braintree',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitdf66356ccc3b955090a7e8680db260f4::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitdf66356ccc3b955090a7e8680db260f4::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitdf66356ccc3b955090a7e8680db260f4::$classMap;

        }, null, ClassLoader::class);
    }
}
