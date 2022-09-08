<?php
/**
 * Project benchmark
 * Created by PhpStorm
 * User: 713uk13m <dev@nguyenanhung.com>
 * Copyright: 713uk13m <dev@nguyenanhung.com>
 * Date: 09/22/2021
 * Time: 03:43
 */
require_once __DIR__ . '/../vendor/autoload.php';

$benchmark = new nguyenanhung\Bear\Benchmark\Benchmark();
$benchmark->mark('start');
$benchmark->mark('end');

echo 'elapsed_time: ' . $benchmark->elapsed_time('start', 'end') . PHP_EOL;
echo 'memory_usage: ' . $benchmark->memory_usage() . PHP_EOL;
