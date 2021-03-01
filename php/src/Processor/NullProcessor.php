<?php

declare(strict_types=1);

namespace GildedRose\Processor;

use GildedRose\Model\Item;

class NullProcessor implements ProcessorInterface
{
    public function process(Item $item): void
    {
    }
}
