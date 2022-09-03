<?php

use Alura\Doctrine\Entity\Student;
use Alura\Doctrine\Helper\EntityManagerCreator;

require_once __DIR__."/../vendor/autoload.php";

$entityManager = EntityManagerCreator::createEntityManager();

//Ao invés do meu repositório realizar a query "SELECT * FROM Students WHERE id = $argv[1];"
//e em seguida realizar "DELETE FROM Student WHERE id = id";
//Eu uso o getPartialReference onde eu dou apensas uma refencia e o doctrine já realiza a ação pra mim de forma a melhorar a performance.
//$student = $entityManager->getPartialReference(Student::class, $argv[1]);

$student = $entityManager->find(Student::class, $argv[1]);

$entityManager->remove($student);
$entityManager->flush();
