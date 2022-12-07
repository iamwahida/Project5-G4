<?php

namespace App\Entity;

use App\Repository\ReviewRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReviewRepository::class)]
class Review
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $fk_student = null;

    #[ORM\Column(length: 31)]
    private ?string $subject = null;

    #[ORM\Column]
    private ?int $grade = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $review = null;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getSubject(): ?string
    {
        return $this->subject;
    }

    public function setSubject(string $subject): self
    {
        $this->subject = $subject;

        return $this;
    }

    public function getGrade(): ?int
    {
        return $this->grade;
    }

    public function setGrade(int $grade): self
    {
        $this->grade = $grade;

        return $this;
    }

    public function getReview(): ?string
    {
        return $this->review;
    }

    public function setReview(string $review): self
    {
        $this->review = $review;

        return $this;
    }
}
