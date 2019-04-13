<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\OrdersRepository")
 */
class Orders
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
    private $placedby;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $details;
	
	/**
     * @ORM\Column(type="string", length=10000)
     */
    private $status;
	
	/**
	* @ORM\Column(type="datetime", nullable=false)
	* @ORM\Version
	*/
	private $created;
	
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPlacedby(): ?string
    {
        return $this->placedby;
    }

    public function setPlacedby(string $placedby): self
    {
        $this->placedby = $placedby;

        return $this;
    }

    public function getDetails(): ?string
    {
        return $this->details;
    }

    public function setDetails(string $details): self
    {
        $this->details = $details;

        return $this;
    }
	
	public function getStatus(): ?string
    {
        return $this->status;
    }

	public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }
	
	public function getCreated(): ?string
    {
        return $this->created;
    }


}
