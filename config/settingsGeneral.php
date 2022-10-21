<?php

const DB_SETTINGS = [
    'host' => 'db-mysql-fra1-do-user-3231322-0.b.db.ondigitalocean.com',
    'user' => 'crmuser',
    'password' => 'wOJsBFvM8L72DRKC',
    'name' => 'productionbase',
    'port' => 25060
];

DB::config(DB_SETTINGS['host'], DB_SETTINGS['port'], DB_SETTINGS['user'], DB_SETTINGS['password'], DB_SETTINGS['name'], ['charset' => 'utf8']);

ini_set('display_errors','1');