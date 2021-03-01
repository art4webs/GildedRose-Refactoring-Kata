<?php

require_once __DIR__ . '/../../vendor/autoload.php';

use GildedRose\GildedRose;
use GildedRose\Model\AgedBrieItem;
use GildedRose\Model\BackstagePassItem;
use GildedRose\Model\SimpleItem;
use GildedRose\Model\SulfurasItem;

$conjuredItem = new SimpleItem('Conjured Mana Cake', 3, 6);
$conjuredItem->setConjured(true);

$items = [
    new SimpleItem('+5 Dexterity Vest', 10, 20),
    new AgedBrieItem(2, 0),
    new SimpleItem('Elixir of the Mongoose', 5, 7),
    new SulfurasItem(0),
    new SulfurasItem(-1),
    new BackstagePassItem(15, 20),
    new BackstagePassItem(10, 49),
    new BackstagePassItem(5, 49),
    $conjuredItem
];

$app = new GildedRose($items);

$days = 2;
if (count($argv) > 1) {
    $days = (int) $argv[1];
}

for ($i = 0; $i < $days; $i++) {
    echo("-------- day $i --------" . PHP_EOL);
    echo("name, sellIn, quality" . PHP_EOL);
    foreach ($items as $item) {
        echo $item . PHP_EOL;
    }
    echo PHP_EOL;
    $app->updateQuality();
}
