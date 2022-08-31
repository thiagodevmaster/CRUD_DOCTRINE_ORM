<?php

namespace Alura\Doctrine\Helper;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;

class EntityManagerCreator
{
    public static function createEntityManager(): EntityManager
    {
        // Create a simple "default" Doctrine ORM configuration for Attribute
        $isDevMode = true;
        $proxyDir = null;
        $cache = null;
        $config = ORMSetup::createAttributeMetadataConfiguration(
            [__DIR__."/.."], 
            $isDevMode, 
            $proxyDir, 
            $cache
        );

        // database configuration parameters
        $conn = [
            'driver' => 'pdo_sqlite',
            'path' => __DIR__ . '/../../db.sqlite',
        ];

        // obtaining the entity manager
        return EntityManager::create($conn, $config);
    }
}