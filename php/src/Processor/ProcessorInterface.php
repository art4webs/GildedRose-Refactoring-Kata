<?php

declare(strict_types=1);

namespace GildedRose\Processor;

use GildedRose\Model\Item;

interface ProcessorInterface
{
    public const MAX_QUALITY = 50;

    public function process(Item $item): void;
}
