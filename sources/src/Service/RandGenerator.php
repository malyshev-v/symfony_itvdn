<?php

namespace App\Service;

class RandGenerator
{
    public int $myVar1;
    public int $myVar2;

    public function __construct($myVar1, $myVar2)
    {
        $this->myVar1 = $myVar1;
        $this->myVar2 = $myVar2;
    }

    public function getNewNumber()
    {
        //...
    }
}