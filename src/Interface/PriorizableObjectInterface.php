<?php

namespace App\Interface;

use App\Enum\PriorityEnum;

interface PriorizableObjectInterface
{
    public function getPriority(): PriorityEnum;
}
