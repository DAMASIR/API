<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Entity;
use App\Repository\EmpresaRepository;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiSubresource;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: EmpresaRepository::class)]
#[ApiResource(
    normalizationContext: ['groups' => ['empresa']],
    denormalizationContext: ['groups' => ['empresa']],
    order: ["nombre" => "ASC"],
)]
class Empresa
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    #[Groups(['empresa'])]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    #[Groups(['empresa'])]
    private $nombre;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    #[Groups(['empresa'])]
    private $logo;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    #[Groups(['empresa'])]
    private $sector;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    #[Groups(['empresa'])]
    private $direccion;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    #[Groups(['empresa'])]
    private $url;

    #[ORM\Column(type: 'boolean')]
    #[Groups(['empresa'])]
    private $destacada;

    #[ORM\OneToMany(mappedBy: 'empresa', targetEntity: Cotizacion::class, orphanRemoval: true)]
    #[ApiSubresource(maxDepth: 1)]
    private $cotizaciones;

    public function __construct()
    {
        $this->cotizaciones = new ArrayCollection();
    }

    public function __toString(): string
    {
        return (string) $this->getNombre();
    }
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getLogo(): ?string
    {
        return $this->logo;
    }

    public function setLogo(?string $logo): self
    {
        $this->logo = $logo;

        return $this;
    }

    public function getSector(): ?string
    {
        return $this->sector;
    }

    public function setSector(?string $sector): self
    {
        $this->sector = $sector;

        return $this;
    }

    public function getDireccion(): ?string
    {
        return $this->direccion;
    }

    public function setDireccion(?string $direccion): self
    {
        $this->direccion = $direccion;

        return $this;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(?string $url): self
    {
        $this->url = $url;

        return $this;
    }

    public function getDestacada(): ?bool
    {
        return $this->destacada;
    }

    public function setDestacada(bool $destacada): self
    {
        $this->destacada = $destacada;

        return $this;
    }

    /**
     * @return Collection<int, Cotizacion>
     */
    public function getCotizaciones(): Collection
    {
        return $this->cotizaciones;
    }

    public function addCotizacion(Cotizacion $cotizacion): self
    {
        if (!$this->cotizaciones->contains($cotizacion)) {
            $this->cotizaciones[] = $cotizacion;
            $cotizacion->setEmpresa($this);
        }

        return $this;
    }

    public function removeCotizacion(Cotizacion $cotizacion): self
    {
        if ($this->cotizaciones->removeElement($cotizacion)) {
            // set the owning side to null (unless already changed)
            if ($cotizacion->getEmpresa() === $this) {
                $cotizacion->setEmpresa(null);
            }
        }

        return $this;
    }
}
