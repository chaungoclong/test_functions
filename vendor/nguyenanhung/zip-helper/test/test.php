<?php

use nguyenanhung\Libraries\Zip\Zip;

require_once __DIR__ . '/../vendor/autoload.php';

$fileTest = __DIR__ . '/../tmp/test-file.zip';

$zip = new Zip();
$zip->setFilename($fileTest);
$zip->setDataList(
    array(
        __DIR__ . '/../docs'
    )
);
$result = $zip->zip();

d($result);
d(directory_map(__DIR__ . '/../tmp'));

$zip->setExtractFolder(__DIR__ . '/../tmp');
$extract = $zip->unzip();
d($extract);
d(directory_map(__DIR__ . '/../tmp'));
