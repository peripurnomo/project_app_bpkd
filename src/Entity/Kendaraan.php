<?php

namespace App\Entity;

use App\Repository\KendaraanRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="`pkb`")
 */
#[ORM\Entity(repositoryClass: KendaraanRepository::class)]
class Kendaraan
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $jenis_kendaraan;

    #[ORM\Column(type: 'string', length: 255)]
    private $merk;

    #[ORM\Column(type: 'integer')]
    private $tahun_pembuatan;

    #[ORM\Column(type: 'string', length: 255)]
    private $nomor_rangka;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getJenisKendaraan(): ?string
    {
        return $this->jenis_kendaraan;
    }

    public function setJenisKendaraan(string $jenis_kendaraan): self
    {
        $this->jenis_kendaraan = $jenis_kendaraan;

        return $this;
    }

    public function getMerk(): ?string
    {
        return $this->merk;
    }

    public function setMerk(string $merk): self
    {
        $this->merk = $merk;

        return $this;
    }

    public function getTahunPembuatan(): ?int
    {
        return $this->tahun_pembuatan;
    }

    public function setTahunPembuatan(int $tahun_pembuatan): self
    {
        $this->tahun_pembuatan = $tahun_pembuatan;

        return $this;
    }

    public function getNomorRangka(): ?string
    {
        return $this->nomor_rangka;
    }

    public function setNomorRangka(string $nomor_rangka): self
    {
        $this->nomor_rangka = $nomor_rangka;

        return $this;
    }
}
