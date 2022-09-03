<?php

use Alura\Doctrine\Entity\Course;
use Alura\Doctrine\Entity\Student;
use Alura\Doctrine\Helper\EntityManagerCreator;

require_once __DIR__. "/../vendor/autoload.php";

$entityManager = EntityManagerCreator::createEntityManager();

$student_id = $argv[1];
$course_id = $argv[2];

$course = $entityManager->find(Course::class, $course_id);
$student = $entityManager->find(Student::class, $student_id);

$student->enrollInCourse($course);
$entityManager->flush();