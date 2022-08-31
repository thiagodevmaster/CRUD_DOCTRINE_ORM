<?php

use Alura\Doctrine\Entity\Student;
use Alura\Doctrine\Helper\EntityManagerCreator;

require_once __DIR__."/../vendor/autoload.php";

$entityManager = EntityManagerCreator::createEntityManager();

$student = new Student($argv[1]);

//neste caso eu precisei usar o PERSIST pois o doctrine ainda não está monitorando minha transação.
$entityManager->persist($student);
$entityManager->flush();