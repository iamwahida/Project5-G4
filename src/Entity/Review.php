<?php

namespace App\Entity;

use App\Repository\ReviewRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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
    private ?int $grade = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $review = null;

    #[ORM\ManyToOne]
    private ?Student $fk_student = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Subject $fk_subject = null;

   
    public function getId(): ?int
    {
        return $this->id;
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

    public function getFkStudent(): ?Student
    {
        return $this->fk_student;
    }

    public function setFkStudent(?Student $fk_student): self
    {
        $this->fk_student = $fk_student;

        return $this;
    }

    public function getFkSubject(): ?Subject
    {
        return $this->fk_subject;
    }

    public function setFkSubject(?Subject $fk_subject): self
    {
        $this->fk_subject = $fk_subject;

        return $this;
    }
}
