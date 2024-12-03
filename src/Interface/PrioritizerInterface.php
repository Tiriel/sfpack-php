<?php

namespace App\Interface;

interface PrioritizerInterface
{
    public function prioritize(PriorizableObjectInterface $subject);
}
