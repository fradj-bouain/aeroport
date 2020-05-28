<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EpiavionRepository")
 */
class Epiavion
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
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $pdepat;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $parrivee;

    /**
     * @ORM\Column(type="datetime")
     */
    private $horairedepart;

    /**
     * @ORM\Column(type="datetime")
     */
    private $horairearrive;

    /**
     * @ORM\Column(type="float")
     */
    private $prix;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Epipassager", mappedBy="epiavion", orphanRemoval=true)
     */
    private $passagers;

    public function __construct()
    {
        $this->passagers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getPdepat(): ?string
    {
        return $this->pdepat;
    }

    public function setPdepat(string $pdepat): self
    {
        $this->pdepat = $pdepat;

        return $this;
    }

    public function getParrivee(): ?string
    {
        return $this->parrivee;
    }

    public function setParrivee(string $parrivee): self
    {
        $this->parrivee = $parrivee;

        return $this;
    }

    public function getHorairedepart(): ?\DateTimeInterface
    {
        return $this->horairedepart;
    }

    public function setHorairedepart(\DateTimeInterface $horairedepart): self
    {
        $this->horairedepart = $horairedepart;

        return $this;
    }

    public function getHorairearrive(): ?\DateTimeInterface
    {
        return $this->horairearrive;
    }

    public function setHorairearrive(\DateTimeInterface $horairearrive): self
    {
        $this->horairearrive = $horairearrive;

        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * @return Collection|Epipassager[]
     */
    public function getPassagers(): Collection
    {
        return $this->passagers;
    }

    public function addPassager(Epipassager $passager): self
    {
        if (!$this->passagers->contains($passager)) {
            $this->passagers[] = $passager;
            $passager->setEpiavion($this);
        }

        return $this;
    }

    public function removePassager(Epipassager $passager): self
    {
        if ($this->passagers->contains($passager)) {
            $this->passagers->removeElement($passager);
            // set the owning side to null (unless already changed)
            if ($passager->getEpiavion() === $this) {
                $passager->setEpiavion(null);
            }
        }

        return $this;
    }

        public function __toString()
    {
        return $this->name;
    }
}
