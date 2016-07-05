<?php
require __DIR__ . '/../vendor/autoload.php';

define('REDIS_HOST', isset($_SERVER['REDIS_HOST']) ? $_SERVER['REDIS_HOST'] : '127.0.0.1');

error_log('c='. $_GET['c']);

$redisAdapter = new \Prometheus\Storage\Redis(REDIS_HOST);
$registry = new \Prometheus\Registry($redisAdapter);

$counter = $registry->registerCounter('test', 'some_counter', 'it increases', ['type']);
$counter->incBy($_GET['c'], ['blue']);

echo "OK\n";