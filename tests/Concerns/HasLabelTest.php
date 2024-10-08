<?php

use Workbench\App\Attributable;
use Workbench\App\Component;

it('can set a string label', function () {
    $component = new Component;
    $component->setLabel($l = 'Label');
    expect($component->getLabel())->toBe($l);
});

it('can set a closure label', function () {
    $component = new Component;
    $component->setLabel(fn () => 'Label');
    expect($component->getLabel())->toBe('Label');
});

it('prevents null values', function () {
    $component = new Component;
    $component->setLabel(null);
    expect($component->lacksLabel())->toBeTrue();
});

it('can chain label', function () {
    $component = new Component;
    expect($component->label($l = 'Label'))->toBeInstanceOf(Component::class);
    expect($component->getLabel())->toBe($l);
});

it('checks for label', function () {
    $component = new Component;
    expect($component->hasLabel())->toBeFalse();
    $component->setLabel('Label');
    expect($component->hasLabel())->toBeTrue();
});

it('checks for no label', function () {
    $component = new Component;
    expect($component->lacksLabel())->toBeTrue();
    $component->setLabel('Label');
    expect($component->lacksLabel())->toBeFalse();
});

it('converts text to a label', function () {
    $label = (new Component)->toLabel('new-Label');
    expect($label)->toBe('New label');
});

it('evaluates the label attribute', function () {
    $component = new Attributable;
    expect($component->getLabel())->toBe('Label');
});

it('evaluates the label attribute only as fallback', function () {
    $component = new Attributable;
    $component->setLabel(fn () => 'Setter');
    expect($component->getLabel())->toBe('Setter');
});
