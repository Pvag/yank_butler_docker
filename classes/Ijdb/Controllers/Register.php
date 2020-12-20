<?php

namespace Ijdb\Controllers;

class Register
{
    private $authorsTable;

    public function __construct($authorsTable)
    {
        $this->authorsTable = $authorsTable;
    }

    public function show()
    {
    }
}
