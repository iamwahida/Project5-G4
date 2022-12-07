<?php

namespace App\Entity;

use App\Repository\TutUnitRepository;
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

    #[ORM\Column]
    private ?int $fk_student = null;

    #[ORM\Column(length: 31)]
    private ?string $fk_subject = null;

    #[ORM\Column(length: 31)]
    private ?string $fk_university = null;

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

    public function getFkStudent(): ?int
    {
        return $this->fk_student;
    }

    public function setFkStudent(int $fk_student): self
    {
        $this->fk_student = $fk_student;

        return $this;
    }

    public function getFkSubject(): ?int
    {
        return $this->fk_subject;
    }

    public function setFkSubject(int $fk_subject): self
    {
        $this->subject = $fk_subject;

        return $this;
    }

    public function getFkUniversity(): ?int
    {
        return $this->fk_university;
    }

    public function setUniversity(string $fk_university): self
    {
        $this->university = $fk_university;

        return $this;
    }
}
