<?php

namespace App\Prioritizer;

use App\Interface\PrioritizerInterface;
use App\Interface\PriorizableObjectInterface;

abstract class AbstractPrioritizer implements PrioritizerInterface
{

    public function prioritize(PriorizableObjectInterface $subject)
    {
        if (!\property_exists($subject, 'priority')) {
            throw new \InvalidArgumentException("Subject must contain a priority property.");
        }

        foreach ($this->getProperties() as $property) {
            if (!\property_exists($subject, $property)) {
                throw new \InvalidArgumentException(sprintf("Property %s must exist in the class.", $property));
            }
        }

        $this->doPrioritize($subject);
    }

    abstract protected function doPrioritize(PriorizableObjectInterface $subject);
    abstract protected function getProperties(): array;
}
