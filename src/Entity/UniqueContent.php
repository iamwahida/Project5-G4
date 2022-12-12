<?php

namespace App\Entity;

use App\Repository\UniqueContentRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UniqueContentRepository::class)]
class UniqueContent
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 31)]
    private ?string $first_name = null;

    #[ORM\Column(length: 63)]
    private ?string $last_name = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column(length: 63)]
    private ?string $tut_pic = null;

    #[ORM\Column(length: 63)]
    private ?string $bg_pic = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstName(): ?string
    {
        return $this->first_name;
    }

    public function setFirstName(string $first_name): self
    {
        $this->first_name = $first_name;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->last_name;
    }

    public function setLastName(string $last_name): self
    {
        $this->last_name = $last_name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getTutPic(): ?string
    {
        return $this->tut_pic;
    }

    public function setTutPic(string $tut_pic): self
    {
        $this->tut_pic = $tut_pic;

        return $this;
    }

    public function getBgPic(): ?string
    {
        return $this->bg_pic;
    }

    public function setBgPic(string $bg_pic): self
    {
        $this->bg_pic = $bg_pic;

        return $this;
    }
}
