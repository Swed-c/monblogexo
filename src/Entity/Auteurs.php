<?php

namespace App\Entity;

use App\Repository\AuteursRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AuteursRepository::class)]
class Auteurs
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $prenom = null;

    #[ORM\OneToMany(mappedBy: 'auteurs', targetEntity: Articles::class)]
    private Collection $Articles;

    public function __construct()
    {
        $this->Articles = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * @return Collection<int, Articles>
     */
    public function getArticles(): Collection
    {
        return $this->Articles;
    }

    public function addArticle(Articles $article): self
    {
        if (!$this->Articles->contains($article)) {
            $this->Articles->add($article);
            $article->setAuteurs($this);
        }

        return $this;
    }

    public function removeArticle(Articles $article): self
    {
        if ($this->Articles->removeElement($article)) {
            // set the owning side to null (unless already changed)
            if ($article->getAuteurs() === $this) {
                $article->setAuteurs(null);
            }
        }

        return $this;
    }

   
}
