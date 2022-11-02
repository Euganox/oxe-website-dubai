<?php

function getObjects($arr) {
    $newArr = [];
    if (is_array($arr)) foreach ($arr as $item) if (!$item['archive']) array_push($newArr, $item);
    return $newArr;
}

const OBJECTS = [
    [
        'id' => 1,
        'archive' => false,
        'img' => 'peninsula/peninsula_card.png',
        'tags' => ['hottest', 'topsales'],
        'title' => 'Peninsula',
        'descr' => 'Business Bay',
        'year' => '2025',
        'istallment' => true,
        'payment' => 'from 10%',
        'from_price' => '50 000',
    ],
    [
        'id' => 2,
        'archive' => false,
        'img' => 'creek/creek_card.png',
        'tags' => ['hottest'],
        'title' => 'Dubai Creek Harbor Views International',
        'descr' => 'Dubai Creek Harbour',
        'year' => '2025',
        'istallment' => true,
        'payment' => 'from 15%',
        'from_price' => '25 000',
    ],
    [
        'id' => 3,
        'archive' => false,
        'img' => 'safaone/safaone_card.png',
        'tags' => ['hottest'],
        'title' => 'Safa One',
        'descr' => 'Al Safa',
        'year' => '2023',
        'istallment' => true,
        'payment' => 'from 9%',
        'from_price' => '68 000',
    ],
    [
        'id' => 4,
        'archive' => false,
        'img' => 'creek/creek_card.png',
        'tags' => ['topsales'],
        'title' => 'Safa Two',
        'descr' => 'Al Safa',
        'year' => '2026',
        'istallment' => false,
        'payment' => 'from 15%',
        'from_price' => '89 000',
    ],
];