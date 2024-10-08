<?php

declare(strict_types=1);

namespace Conquest\Core\Concerns;

use Conquest\Core\Exceptions\MissingRequiredAttributeException;

/**
 * Set a required key property.
 */
trait RequiresKey
{
    /**
     * Retrieve the key property
     *
     * @throws MissingRequiredAttributeException
     */
    public function getKey(): string
    {
        if (isset($this->key)) {
            return $this->key;
        }

        if (method_exists($this, 'key')) {
            return $this->key();
        }

        throw new MissingRequiredAttributeException('key', $this);
    }
}
