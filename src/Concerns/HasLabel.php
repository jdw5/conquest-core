<?php

declare(strict_types=1);

namespace Conquest\Core\Concerns;

use Closure;

/**
 * Set a label for a class.
 */
trait HasLabel
{
    protected string|Closure|null $label = null;

    /**
     * Set the label, chainable.
     */
    public function label(string|Closure $label): static
    {
        $this->setLabel($label);

        return $this;
    }

    /**
     * Set the label quietly.
     */
    public function setLabel(string|Closure|null $label): void
    {
        if (is_null($label)) {
            return;
        }
        $this->label = $label;
    }

    /**
     * Get the label.
     */
    public function getLabel(): ?string
    {
        return $this->evaluate($this->label);
    }

    /**
     * Convert a string to the label format.
     */
    public function toLabel(string|Closure $name): string
    {
        return str($this->evaluate($name))->headline()->lower()->ucfirst()->toString();
    }

    /**
     * Determine if the class has a label.
     */
    public function hasLabel(): bool
    {
        return ! is_null($this->label);
    }

    /**
     * Determine if the class does not have a label.
     */
    public function lacksLabel(): bool
    {
        return ! $this->hasLabel();
    }
}
