<?php

declare(strict_types=1);

namespace GildedRose;

use Exception;
use GildedRose\Model\Item;
use GildedRose\Service\ItemProcessorProvider;

final class GildedRose
{
    private array $items;

    /**
     * @param Item[] $items
     * @throws Exception
     */
    public function __construct(array $items)
    {
        $this->items = $items;
    }

    public function updateQuality(): void
    {
        $provider = new ItemProcessorProvider();

        foreach ($this->items as $item) {
            $processor = $provider->getProcessor($item);
            $processor->process($item);
        }
    }
}
