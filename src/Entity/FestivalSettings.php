<?php

namespace App\Entity;

use App\Repository\FestivalSettingsRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

#[ORM\Entity(repositoryClass: FestivalSettingsRepository::class)]
#[Vich\Uploadable]
class FestivalSettings
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?\DateTime $startDate = null;

    #[ORM\Column]
    private ?\DateTime $endDate = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $posterImage = null;

    #[Vich\UploadableField(mapping: 'poster_image', fileNameProperty: 'posterImage')]
    private ?File $posterImageFile = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTime $updatedAt = null;

    #[ORM\Column(length: 255)]
    private ?string $volunteerLink = null;

    #[ORM\Column]
    private ?\DateTime $tombolaDrawingDate = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStartDate(): ?\DateTime
    {
        return $this->startDate;
    }

    public function setStartDate(\DateTime $startDate): static
    {
        $this->startDate = $startDate;

        return $this;
    }

    public function getEndDate(): ?\DateTime
    {
        return $this->endDate;
    }

    public function setEndDate(\DateTime $endDate): static
    {
        $this->endDate = $endDate;

        return $this;
    }

    public function getPosterImage(): ?string
    {
        return $this->posterImage;
    }

    public function setPosterImage(?string $posterImage): static
    {
        $this->posterImage = $posterImage;

        return $this;
    }

    public function setPosterImageFile(?File $posterImageFile = null): void
    {
        $this->posterImageFile = $posterImageFile;

        if (null !== $posterImageFile) {
            $this->updatedAt = new \DateTime();
        }
    }

    public function getPosterImageFile(): ?File
    {
        return $this->posterImageFile;
    }

    public function getUpdatedAt(): ?\DateTime
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTime $updatedAt): static
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getVolunteerLink(): ?string
    {
        return $this->volunteerLink;
    }

    public function setVolunteerLink(string $volunteerLink): static
    {
        $this->volunteerLink = $volunteerLink;

        return $this;
    }

    public function getTombolaDrawingDate(): ?\DateTime
    {
        return $this->tombolaDrawingDate;
    }

    public function setTombolaDrawingDate(\DateTime $tombolaDrawingDate): static
    {
        $this->tombolaDrawingDate = $tombolaDrawingDate;

        return $this;
    }
}
