<?php

declare(strict_types=1);

namespace GildedRose\Model;

class SulfurasItem extends Item
{
    private const LEGENDARY_ITEM_QUANTITY = 80;

    protected string $name = 'Sulfuras, Hand of Ragnaros';

    public function __construct(int $sellIn)
    {
        parent::__construct($sellIn, self::LEGENDARY_ITEM_QUANTITY);
    }
}
