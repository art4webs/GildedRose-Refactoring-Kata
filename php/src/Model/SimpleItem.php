<?php

declare(strict_types=1);

namespace GildedRose\Model;

class SimpleItem extends Item
{
    protected string $name;

    public function __construct(string $name, int $sellIn, int $quantity)
    {
        $this->name = $name;
        parent::__construct($sellIn, $quantity);
    }
}
