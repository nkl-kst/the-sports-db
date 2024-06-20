<?php

namespace NklKst\TheSportsDb\Entity;

trait BcFieldsTrait
{
    public function __get($name)
    {
        // Check for BC fields
        if (in_array($name, array_keys(self::BC_FIELDS), true)) {

            $newName = self::BC_FIELDS[$name];
            trigger_error(sprintf('Property %s in %s is deprecated, use %s instead', $name, self::class, $newName), E_USER_DEPRECATED);

            return $this->{$newName};
        }

        return $this->{$name};
    }
}
