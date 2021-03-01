<?php

declare(strict_types=1);

namespace GildedRose\Processor;

use GildedRose\Model\Item;

class SimpleProcessor implements ProcessorInterface
{
    public function process(Item $item): void
    {
        $quality = $item->getQuality();
        $sellIt = $item->getSellIn();

        $item->setSellIn($sellIt - 1);

        if ($quality >= self::MAX_QUALITY) {
            return;
        }

        if ($quality === 0) {
            return;
        }

        if ($sellIt <= 0) {
            $newQuality = $quality - 2 * $item->getQuantityStepMultiplier();
            $item->setQuality($newQuality > 0 ? $quality - 2 : 0);
            return;
        }

        $item->setQuality($quality - 1 * $item->getQuantityStepMultiplier());
    }
}
