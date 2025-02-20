<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit50b003f275412c90b1eb909437d5b495
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

        spl_autoload_register(array('ComposerAutoloaderInit50b003f275412c90b1eb909437d5b495', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit50b003f275412c90b1eb909437d5b495', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit50b003f275412c90b1eb909437d5b495::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
