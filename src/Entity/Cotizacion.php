<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\CotizacionRepository;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiSubresource;
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;

#[ORM\Entity(repositoryClass: CotizacionRepository::class)]
#[ApiResource(
    normalizationContext: ['groups' => ['cotizacion']],
    denormalizationContext: ['groups' => ['cotizacion']],
    order: ["fecha" => "DESC"],
)]
class Cotizacion
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    #[Groups(['cotizacion'])]
    private $id;

    #[ORM\Column(type: 'datetime')]
    #[Groups(['cotizacion'])]
    private $fecha;

    #[ORM\Column(type: 'float')]
    #[Groups(['cotizacion'])]
    private $valor;

    #[ORM\ManyToOne(targetEntity: Empresa::class, inversedBy: 'cotizaciones')]
    #[ORM\JoinColumn(nullable: false)]      
    #[Groups(['cotizacion'])]
    #[ApiSubresource(maxDepth: 1)]
    #[ApiFilter(SearchFilter::class, properties: ['empresa' => 'exact'])]
    private $empresa;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function __toString(): string
    {
        return (string) $this->getFecha()->format('d-m-Y H:i:s');;
    }

    public function getFecha(): ?\DateTimeInterface
    {
        return $this->fecha;
    }

    public function setFecha(\DateTimeInterface $fecha): self
    {
        $this->fecha = $fecha;

        return $this;
    }

    public function getValor(): ?float
    {
        return $this->valor;
    }

    public function setValor(float $valor): self
    {
        $this->valor = $valor;

        return $this;
    }

    public function getEmpresa(): ?Empresa
    {
        return $this->empresa;
    }

    public function setEmpresa(?Empresa $empresa): self
    {
        $this->empresa = $empresa;

        return $this;
    }
}
