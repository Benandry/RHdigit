<?php

namespace App\EmployeManagement\Domain\Model\Entity;

use App\Entity\Leave;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Validator\Constraints as Assert;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;

#[Vich\Uploadable()]
#[ORM\Entity]
#[ORM\HasLifecycleCallbacks]
class Employee
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $firstname = null;

    #[ORM\Column(length: 255)]
    private ?string $lastname = null;

    #[ORM\Column(length: 255)]
    private ?string $cin = null;

    #[ORM\Column(length: 255)]
    private ?string $adresse = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $phoneNumber = null;

    #[ORM\Column]
    private ?float $salary = null;

    #[ORM\ManyToOne(inversedBy: 'employees')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Poste $poste = null;

    #[ORM\ManyToOne(inversedBy: 'employees')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Contrat $contrat = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $dateOfBirth = null;

    #[ORM\Column(nullable: true)]
    private ?string $imageName = null;

    #[Vich\UploadableField(mapping: 'employees', fileNameProperty: 'imageName')]
    #[Assert\Image()]
    private ?File $imageFile = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $updatedAt = null;

    #[ORM\OneToMany(mappedBy: 'employee', targetEntity: Leave::class, orphanRemoval: true)]
    private Collection $leaves;

    public function __construct()
    {
        $this->leaves = new ArrayCollection();
    }

   public static function create(
        string $firstname,
        string $lastname,
        string $cin,
        string $adresse,
        ?string $phoneNumber,
        float $salary,
        Poste $poste,
        Contrat $contrat,
        \DateTimeImmutable $dateOfBirth
    ): self {
        $employee = new self();
        $employee->firstname = $firstname;
        $employee->lastname = $lastname;
        $employee->cin = $cin;
        $employee->adresse = $adresse;
        $employee->phoneNumber = $phoneNumber;
        $employee->salary = $salary;
        $employee->poste = $poste;
        $employee->contrat = $contrat;
        $employee->dateOfBirth = $dateOfBirth;

        $employee->updatedAt = new \DateTimeImmutable();

        return $employee;
    }

    public function updateProfile(
        string $firstname,
        string $lastname,
        string $cin,
        string $adresse,
        ?string $phoneNumber,
        float $salary,
        Poste $poste,
        Contrat $contrat,
        \DateTimeImmutable $dateOfBirth
    ): void {
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->cin = $cin;
        $this->adresse = $adresse;
        $this->phoneNumber = $phoneNumber;
        $this->salary = $salary;
        $this->poste = $poste;
        $this->contrat = $contrat;
        $this->dateOfBirth = $dateOfBirth;

        $this->updatedAt = new \DateTimeImmutable();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }


    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function getCin(): ?string
    {
        return $this->cin;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }


    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }


    public function getSalary(): ?float
    {
        return $this->salary;
    }

    public function getPoste(): ?Poste
    {
        return $this->poste;
    }


    public function getContrat(): ?Contrat
    {
        return $this->contrat;
    }

    public function getDateOfBirth(): ?\DateTimeImmutable
    {
        return $this->dateOfBirth;
    }

    public function getImageName(): ?string
    {
        return $this->imageName;
    }

    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    #[ORM\PreUpdate]
    public function setUpdatedAtValue(): void
    {
        $this->updatedAt = new \DateTimeImmutable();
    }

    /**
     * @return Collection<int, Leave>
     */
    public function getLeaves(): Collection
    {
        return $this->leaves;
    }

    public function addLeaf(Leave $leaf): static
    {
        if (!$this->leaves->contains($leaf)) {
            $this->leaves->add($leaf);
            $leaf->setEmployee($this);
        }

        return $this;
    }

    public function removeLeaf(Leave $leaf): static
    {
        if ($this->leaves->removeElement($leaf)) {
            // set the owning side to null (unless already changed)
            if ($leaf->getEmployee() === $this) {
                $leaf->setEmployee(null);
            }
        }

        return $this;
    }



}
