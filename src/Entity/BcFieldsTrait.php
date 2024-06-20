<?php

namespace NklKst\TheSportsDb\Entity;

trait BcFieldsTrait
{
    public function __get($name)
    {
        // Check for BC fields
        if (in_array($name, array_keys(self::BC_FIELDS), true)) {

            // TODO: Trigger deprecation

            return $this->{self::BC_FIELDS[$name]};
        }

        return $this->{$name};
    }
}
