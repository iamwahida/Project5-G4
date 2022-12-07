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
}
