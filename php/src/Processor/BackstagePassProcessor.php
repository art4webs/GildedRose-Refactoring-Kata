<?php

declare(strict_types=1);

namespace GildedRose\Processor;

use GildedRose\Model\Item;

class BackstagePassProcessor implements ProcessorInterface
{
    public function process(Item $item): void
    {
        $quality = $item->getQuality();
        $sellIt = $item->getSellIn();
        $item->setSellIn($sellIt - 1);

        if ($sellIt <= 0) {
            $item->setQuality(0);
            return;
        }

        if ($sellIt <= 5) {
            $newQuality = $quality + 3 * $item->getQuantityStepMultiplier();
            $item->setQuality($newQuality > 50 ? 50 : $newQuality);
            return;
        }

        if ($sellIt <= 10) {
            $newQuality = $quality + 2 * $item->getQuantityStepMultiplier();
            $item->setQuality($newQuality > 50 ? 50 : $newQuality);
            return;
        }

        $newQuality = $quality + 1 * $item->getQuantityStepMultiplier();
        $item->setQuality($newQuality > 50 ? 50 : $newQuality);
    }
}
