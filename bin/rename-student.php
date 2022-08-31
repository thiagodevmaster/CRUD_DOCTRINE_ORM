<?php

use Alura\Doctrine\Entity\Student;
use Alura\Doctrine\Helper\EntityManagerCreator;

require_once __DIR__."/../vendor/autoload.php";

$entityManager = EntityManagerCreator::createEntityManager();

$studentRepository = $entityManager->getRepository(Student::class);

//quando eu uso a variavel $argv estou dizendo sobre os argumentos passados na linha de comando onde 
//o $argv[1] seria o segundo argumento, o $argv[2] o terceiro e assim sucessitavemnte
$student = $studentRepository->find($argv[1]);

$student->changeName($argv[2]);

//neste caso não precisei usar antes o metodo PERSIST do repositório ofercido pelo doctrine, pois minha já está sendo monitorada pelo doctrine
//Dai eu preciso utilizar apenas o flush para realizar minha transação
$entityManager->flush();