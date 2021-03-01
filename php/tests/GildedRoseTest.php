<?php

declare(strict_types=1);

namespace Tests;

use Exception;
use GildedRose\GildedRose;
use GildedRose\Model\AgedBrieItem;
use GildedRose\Model\BackstagePassItem;
use GildedRose\Model\Item;
use GildedRose\Model\SimpleItem;
use GildedRose\Model\SulfurasItem;
use PHPUnit\Framework\TestCase;

class GildedRoseTest extends TestCase
{
    public function testFoo(): void
    {
        $items = [new SimpleItem('foo', 0, 0)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertSame('foo', $items[0]->getName());
    }

    /**
     * @dataProvider getItemsToBeConjured
     *
     * @throws Exception
     */
    public function testConjuredAfterDays(Item $item, int $days, int $expectedQuality): void
    {
        $item->setConjured(true);
        $items = [$item];
        $gildedRose = new GildedRose($items);

        for ($i = 0; $i < $days; $i++) {
            $gildedRose->updateQuality();
        }

        $this->assertSame($expectedQuality, $items[0]->getQuality());
    }

    public function getItemsToBeConjured(): array
    {
        return [
            [new SimpleItem('foo', 3, 10), 2, 6],
            [new BackstagePassItem(10, 10), 2, 18],
            [new BackstagePassItem(5, 10), 2, 22],
            [new BackstagePassItem(0, 10), 2, 0],
            [new AgedBrieItem(3, 10), 2, 14],
            [new SulfurasItem(3), 2, 80],
        ];
    }
}
