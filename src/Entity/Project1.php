<?php

namespace App\Entity;

use App\Repository\Project1Repository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    #[ORM\OneToMany(mappedBy: 'project', targetEntity: ProjectImage::class)]
    private Collection $projectImages;

    public function __construct()
    {
        $this->projectImages = new ArrayCollection();
    }

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

    /**
     * @return Collection<int, ProjectImage>
     */
    public function getProjectImages(): Collection
    {
        return $this->projectImages;
    }

    public function addProjectImage(ProjectImage $projectImage): self
    {
        if (!$this->projectImages->contains($projectImage)) {
            $this->projectImages->add($projectImage);
            $projectImage->setProject($this);
        }

        return $this;
    }

    public function removeProjectImage(ProjectImage $projectImage): self
    {
        if ($this->projectImages->removeElement($projectImage)) {
            // set the owning side to null (unless already changed)
            if ($projectImage->getProject() === $this) {
                $projectImage->setProject(null);
            }
        }

        return $this;
    }
}
