<?php

namespace App\Prioritizer;

use App\Enum\PriorityEnum;
use App\Interface\PriorizableObjectInterface;
use App\Model\Event;

class EventPrioritizer extends AbstractPrioritizer
{
    public const PROPS = [
        'volunteers',
        'minVolunteers',
        'optimalVolunteers',
    ];

    protected function doPrioritize(PriorizableObjectInterface $subject)
    {
        /** @var Event $subject */
        switch ($subject) {
            case \count($subject->getVolunteers()) < $subject->getMinVolunteers():
                $subject->setPriority(PriorityEnum::High);
                break;
            case \count($subject->getVolunteers()) >= $subject->getOptimalVolunteers():
                $subject->setPriority(PriorityEnum::Low);
                break;
            default:
                $subject->setPriority(PriorityEnum::Medium);
        }
    }

    protected function getProperties(): array
    {
        return static::PROPS;
    }
}
