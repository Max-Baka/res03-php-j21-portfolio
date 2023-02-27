<?php

namespace App\Entity;

use App\Repository\ProjectRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProjectRepository::class)]
class Project
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Name = null;

    #[ORM\Column(length: 255)]
    private ?string $Techno_principal = null;

    #[ORM\Column(length: 255)]
    private ?string $Second_techno = null;

    #[ORM\Column(length: 255)]
    private ?string $Description = null;

    #[ORM\Column(length: 255)]
    private ?string $return = null;

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

    public function getTechnoPrincipal(): ?string
    {
        return $this->Techno_principal;
    }

    public function setTechnoPrincipal(string $Techno_principal): self
    {
        $this->Techno_principal = $Techno_principal;

        return $this;
    }

    public function getSecondTechno(): ?string
    {
        return $this->Second_techno;
    }

    public function setSecondTechno(string $Second_techno): self
    {
        $this->Second_techno = $Second_techno;

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

    public function getReturn(): ?string
    {
        return $this->return;
    }

    public function setReturn(string $return): self
    {
        $this->return = $return;

        return $this;
    }
}
