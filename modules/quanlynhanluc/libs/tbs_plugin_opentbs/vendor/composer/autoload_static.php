<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit8cb3f165c8b7c6e2103593b54a442ab0
{
    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'clsOpenTBS' => __DIR__ . '/../..' . '/tbs_plugin_opentbs.php',
        'clsTbsDataSource' => __DIR__ . '/..' . '/tinybutstrong/tinybutstrong/tbs_class.php',
        'clsTbsLocator' => __DIR__ . '/..' . '/tinybutstrong/tinybutstrong/tbs_class.php',
        'clsTbsXmlLoc' => __DIR__ . '/../..' . '/tbs_plugin_opentbs.php',
        'clsTbsZip' => __DIR__ . '/../..' . '/tbs_plugin_opentbs.php',
        'clsTinyButStrong' => __DIR__ . '/..' . '/tinybutstrong/tinybutstrong/tbs_class.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInit8cb3f165c8b7c6e2103593b54a442ab0::$classMap;

        }, null, ClassLoader::class);
    }
}
