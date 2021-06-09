<?php

namespace NklKst\TheSportsDb\Entity\Table;

class Table
{
    /**
     * @deprecated Use $standings instead
     *
     * @var Entry[]
     */
    public array $entries = [];

    /**
     * @var Standing[]
     */
    public array $standings = [];
}
