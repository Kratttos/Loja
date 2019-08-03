<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit2697d608eaae5e15d0fee874a3223870
{
    public static $prefixLengthsPsr4 = array (
        'a' => 
        array (
            'app\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'app\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'app\\controle\\AnuncioControle' => __DIR__ . '/../..' . '/app/controle/AnuncioControle.php',
        'app\\controle\\CategoriaControle' => __DIR__ . '/../..' . '/app/controle/CategoriaControle.php',
        'app\\controle\\IControle' => __DIR__ . '/../..' . '/app/controle/IControle.php',
        'app\\dao\\AnuncioDao' => __DIR__ . '/../..' . '/app/dao/AnuncioDao.php',
        'app\\dao\\CategoriaDao' => __DIR__ . '/../..' . '/app/dao/CategoriaDao.php',
        'app\\dao\\Dao' => __DIR__ . '/../..' . '/app/dao/Dao.php',
        'app\\entidades\\Anuncio' => __DIR__ . '/../..' . '/app/entidades/Anuncio.php',
        'app\\entidades\\Categoria' => __DIR__ . '/../..' . '/app/entidades/Categoria.php',
        'app\\entidades\\Compra' => __DIR__ . '/../..' . '/app/entidades/Compra.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit2697d608eaae5e15d0fee874a3223870::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit2697d608eaae5e15d0fee874a3223870::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit2697d608eaae5e15d0fee874a3223870::$classMap;

        }, null, ClassLoader::class);
    }
}
