<?php

use Alura\Doctrine\Entity\Course;
use Alura\Doctrine\Entity\Phone;
use Alura\Doctrine\Entity\Student;
use Alura\Doctrine\Helper\EntityManagerCreator;

require_once __DIR__."/../vendor/autoload.php";

$entityManager = EntityManagerCreator::createEntityManager();

//Aqui eu crio um Repositório de estudantes
$studentRepository = $entityManager->getRepository(Student::class);


/**@var Student[] $studentList */
$studentList = $studentRepository->findAll();

foreach ($studentList as $student) {
    echo "Id: $student->id\nNome: {$student->getName()}\n";
    
    if($student->getPhones()->count() > 0){

        echo "Telefones: \n";
        echo implode(', ', $student->getPhones()
        ->map(fn (Phone $phone) => $phone->number)
        ->toArray());
    
    }

    if($student->getCourses()->count() > 0){

        echo "Courses:";
        echo implode(', ', $student->getCourses()
        ->map(fn (Course $course) => $course->name)
        ->toArray());
        
        echo PHP_EOL;
    }

    echo "\n";
    }
    
//Aqui eu realizo a busca por um identificador
// $student = $studentRepository->find(2);
// var_dump($student);

// echo "\n\n";

// //Aqui eu busco por um atributo específico
// $result = $studentRepository->findBy([
//     "name"=> "Thiago Dantas",
    
// ]);

// var_dump($result);