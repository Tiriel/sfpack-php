<?php

use App\Enum\PriorityEnum;
use App\Interface\PriorizableObjectInterface;
use App\Model\Event;
use App\Prioritizer\EventPrioritizer;

require_once __DIR__."/vendor/autoload.php";

$prioritizer = new EventPrioritizer();

$e1 = (new Event())
    ->setMinVolunteers(1)
    ->setOptimalVolunteers(5)
;
$e2 = (new Event())
    ->setMinVolunteers(1)
    ->setOptimalVolunteers(5)
    ->addVolunteer([1])
;
$e3 = (new Event())
    ->setMinVolunteers(1)
    ->setOptimalVolunteers(5)
    ->addVolunteer([1])
    ->addVolunteer([2])
    ->addVolunteer([3])
    ->addVolunteer([4])
    ->addVolunteer([5])
    ->addVolunteer([6])
;

$prioritizer->prioritize($e1);
$prioritizer->prioritize($e2);
$prioritizer->prioritize($e3);

function label(PriorizableObjectInterface $a): string
{
    return match ($a->getPriority()) {
        PriorityEnum::Low => 'Low',
        PriorityEnum::Medium => 'Medium',
        PriorityEnum::High => 'High',
    };
}

echo 'Event 1 : '.label($e1).\PHP_EOL;
echo 'Event 2 : '.label($e2).\PHP_EOL;
echo 'Event 3 : '.label($e3).\PHP_EOL;
