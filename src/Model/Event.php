<?php

namespace App\Model;

use App\Enum\PriorityEnum;
use App\Interface\PriorizableObjectInterface;

class Event implements PriorizableObjectInterface
{
    protected ?string $name = null;
    protected ?string $description = null;
    protected ?bool $accessible = null;
    protected ?string $prerequisites = null;

    protected array $volunteers = [];

    protected ?int $minVolunteers = null;
    protected ?int $optimalVolunteers = null;
    protected ?PriorityEnum $priority = null;

    protected ?\DateTimeImmutable $startAt = null;
    protected ?\DateTimeImmutable $endAt = null;

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): Event
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): Event
    {
        $this->description = $description;

        return $this;
    }

    public function getAccessible(): ?bool
    {
        return $this->accessible;
    }

    public function setAccessible(?bool $accessible): Event
    {
        $this->accessible = $accessible;

        return $this;
    }

    public function getPrerequisites(): ?string
    {
        return $this->prerequisites;
    }

    public function setPrerequisites(?string $prerequisites): Event
    {
        $this->prerequisites = $prerequisites;

        return $this;
    }

    public function getVolunteers(): array
    {
        return $this->volunteers;
    }

    public function addVolunteer(array $volunteer): Event
    {
        $this->volunteers[] = $volunteer;

        return $this;
    }

    public function removeVolunteer(array $volunteer): Event
    {
        if (null !== ($key = \array_search($volunteer, $this->volunteers))) {
            unset($this->volunteers[$key]);
        }

        return $this;
    }

    public function getMinVolunteers(): ?int
    {
        return $this->minVolunteers;
    }

    public function setMinVolunteers(?int $minVolunteers): Event
    {
        $this->minVolunteers = $minVolunteers;

        return $this;
    }

    public function getOptimalVolunteers(): ?int
    {
        return $this->optimalVolunteers;
    }

    public function setOptimalVolunteers(?int $optimalVolunteers): Event
    {
        $this->optimalVolunteers = $optimalVolunteers;

        return $this;
    }

    public function getPriority(): PriorityEnum
    {
        return $this->priority;
    }

    public function setPriority(?PriorityEnum $priority): Event
    {
        $this->priority = $priority;

        return $this;
    }

    public function getStartAt(): ?\DateTimeImmutable
    {
        return $this->startAt;
    }

    public function setStartAt(?\DateTimeImmutable $startAt): Event
    {
        $this->startAt = $startAt;

        return $this;
    }

    public function getEndAt(): ?\DateTimeImmutable
    {
        return $this->endAt;
    }

    public function setEndAt(?\DateTimeImmutable $endAt): Event
    {
        $this->endAt = $endAt;

        return $this;
    }
}
