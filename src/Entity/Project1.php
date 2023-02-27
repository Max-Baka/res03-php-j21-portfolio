<?php

namespace App\Entity;

use App\Repository\Project1Repository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: Project1Repository::class)]
class Project1
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Name = null;

    #[ORM\Column(length: 255)]
    private ?string $Firsttechno = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Secondtechno = null;

    #[ORM\Column(length: 1023)]
    private ?string $Description = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->Name;
    }

    public function setName(string $Name): self
    {
        $this->Name = $Name;

        return $this;
    }

    public function getFirsttechno(): ?string
    {
        return $this->Firsttechno;
    }

    public function setFirsttechno(string $Firsttechno): self
    {
        $this->Firsttechno = $Firsttechno;

        return $this;
    }

    public function getSecondtechno(): ?string
    {
        return $this->Secondtechno;
    }

    public function setSecondtechno(?string $Secondtechno): self
    {
        $this->Secondtechno = $Secondtechno;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(string $Description): self
    {
        $this->Description = $Description;

        return $this;
    }
}
