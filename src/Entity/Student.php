<?php

namespace Alura\Doctrine\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\ManyToMany;
use Doctrine\ORM\Mapping\OneToMany;

//Para realizar o mapeamento desta classe com doctrine orm eu preciso declarar esta classe como uma Entidade e eu faço isso com o atributo #[Entity]
#[Entity]
class Student
{
    //Aqui eu defino as colunas da minha tabela como por exemplo o ID onde eu digo que ele será um ID, será auto incrementado, e será uma coluna
    #[Id, GeneratedValue, Column]
    public int $id;

    //OneToMany = Um para muitos ou seja um aluno com muitos telefones
    //nos atributos eu coloco um targetEntity ou seja com que está se relacionando que no caso é com a class Phone
    #[OneToMany(
        targetEntity:Phone::class, 
        mappedBy: "student", 
        cascade: ["persist", "remove"]
        )]
    private Collection $phones;
    
    #[ManyToMany(targetEntity: Course::class, inversedBy:"students")]
    private Collection $courses;

    public function __construct(
        //Aqui eu defino mais uma coluna na minha tabela
        #[Column]
        private string $name
        ){

            $this->phones = new ArrayCollection();
            $this->courses = new ArrayCollection();
        }

    public function ChangeName(string $newName):void
    {
        $this->name = $newName;
    }

    //Não precisária deste método caso eu usasse o READONLY no meu construct, porém a fim de estudos eu optei a não usar 
    public function getName(): string
    {
        return $this->name;
    }

    public function addPhone(Phone $phone): void
    {
        $this->phones->add($phone);
        $phone->setStudent($this);
    }


    /**
     * @return Collection<Phone>
     */
    public function getPhones(): iterable
    {
        return $this->phones;
    }

    /**
     * @return Collection<Course>
     */
    public function getCourses(): Collection
    {
        return $this->courses;
    }

    public function enrollInCourse(Course $course): void
    {
        if($this->courses->contains($course)){
            return;
        }
        $this->courses->add($course);
        $course->addStudent($this);
    }
    
}