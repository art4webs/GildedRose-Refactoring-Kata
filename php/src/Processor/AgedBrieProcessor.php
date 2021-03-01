<?php

declare(strict_types=1);

namespace GildedRose\Processor;

use GildedRose\Model\Item;

class AgedBrieProcessor implements ProcessorInterface
{
    public function process(Item $item): void
    {
        $quality = $item->getQuality();
        $sellIt = $item->getSellIn();
        $item->setSellIn($sellIt - 1);

        if ($quality >= self::MAX_QUALITY) {
            return;
        }

        if ($sellIt <= 0) {
            $item->setQuality($quality + 2 * $item->getQuantityStepMultiplier());
            return;
        }

        $item->setQuality($quality + 1 * $item->getQuantityStepMultiplier());
    }
}
