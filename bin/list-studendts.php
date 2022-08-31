<?php

use Alura\Doctrine\Entity\Student;
use Alura\Doctrine\Helper\EntityManagerCreator;

require_once __DIR__."/../vendor/autoload.php";

$entityManager = EntityManagerCreator::createEntityManager();

//Aqui eu crio um Repositório de estudantes
$studentRepository = $entityManager->getRepository(Student::class);


/**@var Student[] $studentList */
$studentList = $studentRepository->findAll();

foreach ($studentList as $student) {
    echo "Id: $student->id\nNome: {$student->getName()}\n\n";
}

//Aqui eu realizo a busca por um identificador
$student = $studentRepository->find(2);
var_dump($student);

echo "\n\n";

//Aqui eu busco por um atributo específico
$result = $studentRepository->findBy([
    "name"=> "Thiago Dantas"
]);

var_dump($result);