<?php

namespace App\Entity;

use App\Repository\TutUnitRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TutUnitRepository::class)]
class TutUnit
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?bool $available = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $datetime = null;

    #[ORM\ManyToMany(targetEntity: Student::class)]
    private Collection $fk_student;

    #[ORM\ManyToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Subject $fk_subject = null;

    #[ORM\ManyToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?University $fk_university = null;

    public function __construct()
    {
        $this->fk_student = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function isAvailable(): ?bool
    {
        return $this->available;
    }

    public function setAvailable(bool $available): self
    {
        $this->available = $available;

        return $this;
    }

    public function getDatetime(): ?\DateTimeInterface
    {
        return $this->datetime;
    }

    public function setDatetime(\DateTimeInterface $datetime): self
    {
        $this->datetime = $datetime;

        return $this;
    }

    /**
     * @return Collection<int, Student>
     */
    public function getFkStudent(): Collection
    {
        return $this->fk_student;
    }

    public function addFkStudent(Student $fkStudent): self
    {
        if (!$this->fk_student->contains($fkStudent)) {
            $this->fk_student->add($fkStudent);
        }

        return $this;
    }

    public function removeFkStudent(Student $fkStudent): self
    {
        $this->fk_student->removeElement($fkStudent);

        return $this;
    }

    public function getFkSubject(): ?Subject
    {
        return $this->fk_subject;
    }

    public function setFkSubject(Subject $fk_subject): self
    {
        $this->fk_subject = $fk_subject;

        return $this;
    }

    public function getFkUniversity(): ?University
    {
        return $this->fk_university;
    }

    public function setFkUniversity(University $fk_university): self
    {
        $this->fk_university = $fk_university;

        return $this;
    }
}
