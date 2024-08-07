<?php

namespace Workbench\App;

use Conquest\Core\Concerns\CanTransform;
use Conquest\Core\Concerns\CanValidate;
use Conquest\Core\Concerns\HasDescription;
use Conquest\Core\Concerns\HasFormat;
use Conquest\Core\Concerns\HasHttpMethod;
use Conquest\Core\Concerns\HasLabel;
use Conquest\Core\Concerns\HasMeta;
use Conquest\Core\Concerns\HasName;
use Conquest\Core\Concerns\HasPlaceholder;
use Conquest\Core\Concerns\HasProperty;
use Conquest\Core\Concerns\HasRoute;
use Conquest\Core\Concerns\HasTitle;
use Conquest\Core\Concerns\HasType;
use Conquest\Core\Concerns\HasValue;
use Conquest\Core\Concerns\IsActive;
use Conquest\Core\Concerns\IsAuthorized;
use Conquest\Core\Concerns\IsBlank;
use Conquest\Core\Concerns\IsDefault;
use Conquest\Core\Concerns\IsHidden;
use Conquest\Core\Concerns\IsKey;
use Conquest\Core\Concerns\IsVisible;
use Conquest\Core\Identifier\Concerns\HasId;
use Conquest\Core\Options\Concerns\HasOptions;
use Conquest\Core\Primitive;

class Component extends Primitive
{
    use CanTransform;
    use CanValidate;
    use HasDescription;
    use HasFormat;
    use HasHttpMethod;
    use HasId;
    use HasLabel;
    use HasMeta;
    use HasName;
    use HasOptions;
    use HasPlaceholder;
    use HasProperty;
    use HasRoute;
    use HasTitle;
    use HasType;
    use HasValue;
    use IsActive;
    use IsAuthorized;
    use IsBlank;
    use IsDefault;
    use IsHidden;
    use IsKey;
    use IsVisible;

    public function toArray()
    {
        return [
            'id' => $this->getId(),
            'value' => $this->getValue(),
            'label' => $this->getLabel(),
            'meta' => $this->getMeta(),
        ];
    }
}
