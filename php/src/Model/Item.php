<?php

declare(strict_types=1);

namespace GildedRose\Model;

abstract class Item
{
    protected string $name = 'undefined';

    protected int $sellIn;

    protected int $quality;

    protected bool $conjured;

    protected int $quantityStepMultiplier;

    public function __construct(int $sellIn, int $quality)
    {
        $this->quality = $quality;
        $this->sellIn = $sellIn;
        $this->quantityStepMultiplier = 1;
    }

    public function __toString(): string
    {
        return "{$this->name}, {$this->sellIn}, {$this->quality}";
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getQuality(): int
    {
        return $this->quality;
    }

    public function getSellIn(): int
    {
        return $this->sellIn;
    }

    public function getQuantityStepMultiplier(): int
    {
        return $this->quantityStepMultiplier;
    }

    public function setQuality(int $quality): void
    {
        $this->quality = $quality;
    }

    public function setSellIn(int $sellIn): void
    {
        $this->sellIn = $sellIn;
    }

    public function setConjured(bool $conjured): void
    {
        $this->conjured = $conjured;
        $this->quantityStepMultiplier = $conjured ? 2 : 1;
    }
}
