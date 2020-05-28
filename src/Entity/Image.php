<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ImageRepository")
 */
class Image
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $url;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $alt;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Epipassager", mappedBy="image", cascade={"persist", "remove"})
     */
    private $passage;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(string $url): self
    {
        $this->url = $url;

        return $this;
    }

    public function getAlt(): ?string
    {
        return $this->alt;
    }

    public function setAlt(string $alt): self
    {
        $this->alt = $alt;

        return $this;
    }

    public function getPassage(): ?Epipassager
    {
        return $this->passage;
    }

    public function setPassage(?Epipassager $passage): self
    {
        $this->passage = $passage;

        // set (or unset) the owning side of the relation if necessary
        $newImage = null === $passage ? null : $this;
        if ($passage->getImage() !== $newImage) {
            $passage->setImage($newImage);
        }

        return $this;
    }
}
