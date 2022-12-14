<?php

namespace App\Entity;

use App\Repository\CardContentRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CardContentRepository::class)]
class CardContent
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 63)]
    private ?string $card_title = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $card_text = null;

    #[ORM\Column(length: 63)]
    private ?string $card_pic = null;

    #[ORM\ManyToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?University $fk_university = null;

    #[ORM\ManyToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Subject $fk_subject = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCardTitle(): ?string
    {
        return $this->card_title;
    }

    public function setCardTitle(string $card_title): self
    {
        $this->card_title = $card_title;

        return $this;
    }

    public function getCardText(): ?string
    {
        return $this->card_text;
    }

    public function setCardText(string $card_text): self
    {
        $this->card_text = $card_text;

        return $this;
    }

    public function getCardPic(): ?string
    {
        return $this->card_pic;
    }

    public function setCardPic(string $card_pic): self
    {
        $this->card_pic = $card_pic;

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

    public function getFkSubject(): ?Subject
    {
        return $this->fk_subject;
    }

    public function setFkSubject(Subject $fk_subject): self
    {
        $this->fk_subject = $fk_subject;

        return $this;
    }
}
