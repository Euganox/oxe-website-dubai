<?php

function t(string $text) : string {
    $locale = $_SESSION['locale'] ?? "EN";

    if ($locale === "RU") {
        return !empty(LOCALE[$text][$locale]) ? LOCALE[$text][$locale] : $text;
    } else {
        return $text;
    }
}

const LOCALE = [
    'Home' => [
        "RU" => 'Главная'
    ],
    'About Us' => [
        "RU" => 'О нас'
    ],
    'About us' => [
        "RU" => 'О нас'
    ],
    'Catalog' => [
        "RU" => 'Каталог'
    ],
    'Contacts' => [
        "RU" => 'Контакты'
    ],
    "Our Contacts" => [
        "RU" => 'Наши  контакты'
    ],
    'Billion worth real estate in' => [
        'RU' => 'Недвижимость стоимостью в миллиард долларов в'
    ],
    'Dubai' => [
        'RU' => 'Дубай'
    ],
    'see options' => [
        "RU" => 'посмотреть'
    ],
    'Ermishina Oxana' => [
        'RU' => 'Ермишина Оксана'
    ],
    "we love big houses, big deals and big money. And we've made that love our job. Buying, renting, selling, investing -" => [
        "RU" => 'Мы любим большие дома, большие сделки и большие деньги. И сделали эту любовь своей работой. Купить, арендовать, продать, инвестировать, оформить, проконсультировать и выполнить еще миллион действий –'
    ],
    "NO PROBLEM." => [
        "RU" => "НЕ ВОПРОС."
    ],
    "About company" => [
        "RU" => "О компании"
    ],
    "We do not need complicated wording, and our objects - unnecessary epithets. The best doesn't need any epithets. We are young, energetic and ambitious, which means that you are the first to have access to the best. We value our time and yours, we value ours and your reputation, we count our money and yours. We work as if we plan to live forever, and we live as if we don't work at all." => [
        "RU" => ""
    ],
    "The mission" => [
        "RU" => "Миссия"
    ],
    "OXE GROUP's mission is helping people to find the best properties available on the elite real estate market to live in, to invest in or to use for business development. We make your billions work for your benefit." => [
        "RU" => ""
    ],
    "The team" => [
        "RU" => "Команда"
    ],
    "As of today, the company staff numbers 115 persons. The OXE team often takes perceived risks looking at all potential risk scenarios and therefore achieves what most people find impossible. The OXE GROUP team are young, outstanding, daring professionals." => [
        "RU" => "Миссия"
    ],
    "Services" => [
        "RU" => "Сервис"
    ],
    "The OXE GROUP brand means high standard of service that ensures maximal loyalty of its partners and clients." => [
        "RU" => "Миссия"
    ],
    "Advantages" => [
        "RU" => "Преимущества"
    ],
    "Our mane focus is investments. We do pre-sales at the most famous projects in Dubai and give an opportunity for your millions become billions. We work as if we expect to live forever, and live the way as if we do not work." => [
        "RU" => ""
    ],
    "learn more" => [
        "RU" => "читать далее"
    ],
    "Our ideology" => [
        "RU" => "Наша идеология"
    ],
    'We are <span class="beauty-body-words fz-4-rem font-arolse-serif text-color-red">young, energetic and ambitious,</span> which means you are the first to get access to the best' => [
        "RU" => ""
    ],
    "CONTACT US" => [
        "RU" => "СВЯЗАТЬСЯ С НАМИ"
    ],
    "Leave your details, and we will call you back within 10 minutes" => [
        "RU" => "Оставьте свои контакты и мы позвоним вам в течение 10 минут"
    ],
    "Your name" => [
        "RU" => "Ваше Имя"
    ],
    "Your phone" => [
        "RU" => "Ваш номер телефона"
    ],
    "By clicking «send» you agree to the privacy policy" => [
        "RU" => "Отправляя форму, вы соглашаетесь с обработкой ваших данных"
    ],
    "send" => [
        "RU" => "отправить"
    ],
    'TOP <span class="font-arolse-serif-special font-arolse-serif fz-80-px">O</span>FFERS' => [
        "RU" => 'ТОП <span class="font-arolse-serif-special font-arolse-serif fz-80-px">П</span>РЕДЛОЖЕНИЯ'
    ],
    "go to catalog" => [
        "RU" => "в каталог"
    ],
    "Year" => [
        "RU" => "Год"
    ],
    "Installment" => [
        "RU" => "Частичный взнос"
    ],
    "Initial payment" => [
        "RU" => "Первичный взнос"
    ],
    'book a call' => [
        "RU" => "заказать звонок"
    ],
    'Investments' => [
        "RU" => "Инвестиции"
    ],
    'Real Estate: buy, sell, rent' => [
        "RU" => "Недвижимость: покупка, продажа, аренда"
    ],
    'Management of Real Estate' => [
        "RU" => "Управление недвижимостью"
    ],
    'Consulting' => [
        "RU" => "Консультации"
    ],
    'Citizenship, passport' => [
        "RU" => "Гражданство, паспорт"
    ],
    'Business Relocation' => [
        "RU" => "Релокация бизнеса"
    ],
    'Legal services' => [
        "RU" => "Юридические услуги"
    ],
    'Documents' => [
        "RU" => "Документы"
    ],
    'Insurance' => [
        "RU" => "Страхование"
    ],
];