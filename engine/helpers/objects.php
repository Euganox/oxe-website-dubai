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
        'longitude' => '55.2891',
        'latitude' => '25.2408',
        'img' => 'peninsula/peninsula_card.png',
        'tags' => ['hottest', 'topsales'],
        'description' => '
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer in facilisis sem, a porta justo. 
                Nullam in egestas tellus, et feugiat neque. Donec a tincidunt magna. Fusce luctus ante orci, quis 
                bibendum nunc posuere pharetra. Sed a odio libero. Maecenas finibus rutrum justo gravida congue. Nulla 
                non molestie nunc, eu condimentum elit. Phasellus at suscipit ante. Duis laoreet iaculis erat vel 
                volutpat. Phasellus nec viverra turpis, a dignissim nisl. Quisque dapibus velit ut orci sollicitudin, 
                in tempus quam mollis. Aenean imperdiet, augue ut viverra tempor, magna neque pharetra sem, sed mattis 
                massa leo id nisl. In eu maximus metus, non sollicitudin nibh. Proin ipsum est, tempor vitae tempor eu, 
                rutrum et mi.
            </p>
            <p>
                Cras at varius mauris, id consequat ipsum. Ut pharetra dolor quam, in ultrices tortor sodales sit amet.
                Cras molestie nec mi vitae elementum. Curabitur eu aliquam metus. Duis massa libero, tincidunt vitae 
                est ac, eleifend fermentum odio. Pellentesque et interdum lacus. Nullam vitae justo id sapien rutrum 
                volutpat in commodo magna.
            </p>
        ',
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
        'longitude' => '55.2825',
        'latitude' => '25.2181',
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
        'longitude' => '55.2780',
        'latitude' => '25.2181',
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
        'longitude' => '55.2721',
        'latitude' => '25.2401',
        'tags' => ['topsales'],
        'title' => 'Safa Two',
        'descr' => 'Al Safa',
        'year' => '2026',
        'istallment' => false,
        'payment' => 'from 15%',
        'from_price' => '89 000',
    ],[
        'id' => 5,
        'archive' => false,
        'img' => 'creek/creek_card.png',
        'longitude' => '55.2593',
        'latitude' => '25.2164',
        'tags' => ['topsales'],
        'title' => 'Safa Two',
        'descr' => 'Al Safa',
        'year' => '2026',
        'istallment' => false,
        'payment' => 'from 15%',
        'from_price' => '89 000',
    ],[
        'id' => 6,
        'archive' => false,
        'img' => 'creek/creek_card.png',
        'longitude' => '55.1676',
        'latitude' => '25.1101',
        'tags' => ['topsales'],
        'title' => 'Safa Two',
        'descr' => 'Al Safa',
        'year' => '2026',
        'istallment' => false,
        'payment' => 'from 15%',
        'from_price' => '89 000',
    ],[
        'id' => 7,
        'archive' => false,
        'img' => 'creek/creek_card.png',
        'longitude' => '55.2006',
        'latitude' => '25.0884',
        'tags' => ['topsales'],
        'title' => 'Safa Two',
        'descr' => 'Al Safa',
        'year' => '2026',
        'istallment' => false,
        'payment' => 'from 15%',
        'from_price' => '89 000',
    ],[
        'id' => 8,
        'archive' => false,
        'img' => 'creek/creek_card.png',
        'tags' => ['topsales'],
        'longitude' => '55.1522',
        'latitude' => '25.0595',
        'title' => 'Safa Two',
        'descr' => 'Al Safa',
        'year' => '2026',
        'istallment' => false,
        'payment' => 'from 15%',
        'from_price' => '89 000',
    ],[
        'id' => 9,
        'archive' => false,
        'img' => 'creek/creek_card.png',
        'longitude' => '63.0781',
        'latitude' => '-151.3597',
        'tags' => ['topsales'],
        'title' => 'Safa Two',
        'descr' => 'Al Safa',
        'year' => '2026',
        'istallment' => false,
        'payment' => 'from 15%',
        'from_price' => '89 000',
    ],[
        'id' => 10,
        'archive' => false,
        'img' => 'creek/creek_card.png',
        'longitude' => '63.0781',
        'latitude' => '-151.3597',
        'tags' => ['topsales'],
        'title' => 'Safa Two',
        'descr' => 'Al Safa',
        'year' => '2026',
        'istallment' => false,
        'payment' => 'from 15%',
        'from_price' => '89 000',
    ],
];