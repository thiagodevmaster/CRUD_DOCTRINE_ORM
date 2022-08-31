<?php

use Alura\Doctrine\Helper\EntityManagerCreator;
use Doctrine\ORM\Tools\Console\ConsoleRunner;
use Doctrine\ORM\Tools\Console\EntityManagerProvider\SingleManagerProvider;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManager = EntityManagerCreator::createEntityManager();


//Método utilizado para funcionar nas versões seguintes do Doctrine.
ConsoleRunner::run(
    new SingleManagerProvider($entityManager)
);

//consigo ver os métodos oferecidos pelo terminal usando php bin/doctrine.php