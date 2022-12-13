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

    #[ORM\Column(length: 31)]
    private ?string $subject = null;

    #[ORM\Column]
    private ?int $grade = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $review = null;

    #[ORM\ManyToOne]
    private ?student $fk_student = null;

   
    public function getId(): ?int
    {
        return $this->id;
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

    public function getFkStudent(): ?student
    {
        return $this->fk_student;
    }

    public function setFkStudent(?student $fk_student): self
    {
        $this->fk_student = $fk_student;

        return $this;
    }
}
