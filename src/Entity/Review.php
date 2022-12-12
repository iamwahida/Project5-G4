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

    #[ORM\OneToMany(mappedBy: 'review', targetEntity: student::class)]
    private Collection $fk_student;

    #[ORM\Column(length: 31)]
    private ?string $subject = null;

    #[ORM\Column]
    private ?int $grade = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $review = null;

    public function __construct()
    {
        $this->fk_student = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, student>
     */
    public function getFkStudent(): Collection
    {
        return $this->fk_student;
    }

    public function addFkStudent(student $fkStudent): self
    {
        if (!$this->fk_student->contains($fkStudent)) {
            $this->fk_student->add($fkStudent);
            $fkStudent->setReview($this);
        }

        return $this;
    }

    public function removeFkStudent(student $fkStudent): self
    {
        if ($this->fk_student->removeElement($fkStudent)) {
            // set the owning side to null (unless already changed)
            if ($fkStudent->getReview() === $this) {
                $fkStudent->setReview(null);
            }
        }

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
