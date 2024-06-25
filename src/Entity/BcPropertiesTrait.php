<?php

namespace NklKst\TheSportsDb\Entity;

trait BcPropertiesTrait
{
    public function __get($name)
    {
        // Check for BC properties
        if (in_array($name, array_keys(self::BC_PROPERTIES), true)) {

            $newName = self::BC_PROPERTIES[$name];
            trigger_error(sprintf('Property %s in %s is deprecated, use %s instead', $name, self::class, $newName), E_USER_DEPRECATED);

            return $this->{$newName};
        }

        return $this->{$name};
    }
}
