<?php

namespace Alura\Doctrine\Entity;

use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\GeneratedValue;

//Para realizar o mapeamento desta classe com doctrine orm eu preciso declarar esta classe como uma Entidade e eu faço isso com o atributo #[Entity]
#[Entity]
class Student
{
    //Aqui eu defino as colunas da minha tabela como por exemplo o ID onde eu digo que ele será um ID, será auto incrementado, e será uma coluna
    #[Id]
    #[GeneratedValue]
    #[Column]
    public int $id;

    public function __construct(
        //Aqui eu defino mais uma coluna na minha tabela
        #[Column]
        private string $name
        ){}

    public function ChangeName(string $newName):void
    {
        $this->name = $newName;
    }

    //Não precisária deste método caso eu usasse o READONLY no meu construct, porém a fim de estudos eu optei a não usar 
    public function getName(): string
    {
        return $this->name;
    }
    
}