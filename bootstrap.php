<?php

require_once "vendor/autoload.php";

use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\ORMSetup;
use Doctrine\ORM\EntityManager;

function getEntityManager(): EntityManager
{
    $entityManager = null;

    if ($entityManager === null) {
        $paths = ['src/Entity'];

        $dbParams = [
            'driver' => 'pdo_pgsql',
            'host' => 'database-users',
            'dbname' => 'db-users',
            'user' => 'root',
            'password' => 'master',
            'port' => '5432'
        ];

        $config = ORMSetup::createAttributeMetadataConfiguration($paths);
        $connection = DriverManager::getConnection($dbParams, $config);
        $entityManager = new EntityManager($connection, $config);
    }

    return $entityManager;
}
