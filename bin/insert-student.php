<?php

use Alura\Doctrine\Entity\Phone;
use Alura\Doctrine\Entity\Student;
use Alura\Doctrine\Helper\EntityManagerCreator;

require_once __DIR__."/../vendor/autoload.php";

$entityManager = EntityManagerCreator::createEntityManager();

$student = new Student("aluno com telefones 2");
$student->addPhone(new Phone("(21) 92165-8715"));
$student->addPhone(new Phone("(21) 92165-8715"));
$student->addPhone(new Phone("(21) 99999-1111"));


$entityManager->persist($student);

//neste caso eu precisei usar o PERSIST pois o doctrine ainda não está monitorando minha transação.
$entityManager->flush();