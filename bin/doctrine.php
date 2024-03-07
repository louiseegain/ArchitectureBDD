#!/usr/bin/env php
<?php

use Doctrine\ORM\Tools\Console\ConsoleRunner;
use Doctrine\ORM\Tools\Console\EntityManagerProvider\SingleManagerProvider;
use Doctrine\DBAL\Types\Type;
use Ramsey\Uuid\Doctrine\UuidBinaryType;

require_once 'bootstrap.php';

try {
    Type::addType('uuid', UuidBinaryType::class);
} catch (\Doctrine\DBAL\Exception $e) {
}

$entityManager = GetEntityManager();

$commands = [
    // If you want to add your own custom console commands,
    // you can do so here.
];

ConsoleRunner::run(
    new SingleManagerProvider($entityManager),
    $commands
);