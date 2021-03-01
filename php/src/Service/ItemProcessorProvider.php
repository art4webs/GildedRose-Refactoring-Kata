<?php

declare(strict_types=1);

namespace GildedRose\Service;

use GildedRose\Model\AgedBrieItem;
use GildedRose\Model\BackstagePassItem;
use GildedRose\Model\Item;
use GildedRose\Model\SimpleItem;
use GildedRose\Model\SulfurasItem;
use GildedRose\Processor\AgedBrieProcessor;
use GildedRose\Processor\BackstagePassProcessor;
use GildedRose\Processor\NullProcessor;
use GildedRose\Processor\ProcessorInterface;
use GildedRose\Processor\SimpleProcessor;
use InvalidArgumentException;

final class ItemProcessorProvider
{
    public function getProcessor(Item $item): ProcessorInterface
    {
        switch (true) {
            case $item instanceof SimpleItem:
                return new SimpleProcessor();
            case $item instanceof AgedBrieItem:
                return new AgedBrieProcessor();
            case $item instanceof BackstagePassItem:
                return new BackstagePassProcessor();
            case $item instanceof SulfurasItem:
                return new NullProcessor();
            default:
                throw new InvalidArgumentException('Processor for provided item cannot be found');
        }
    }
}
