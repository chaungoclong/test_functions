[![Latest Stable Version](http://poser.pugx.org/nguyenanhung/zip-helper/v)](https://packagist.org/packages/nguyenanhung/zip-helper) [![Total Downloads](http://poser.pugx.org/nguyenanhung/zip-helper/downloads)](https://packagist.org/packages/nguyenanhung/zip-helper) [![Latest Unstable Version](http://poser.pugx.org/nguyenanhung/zip-helper/v/unstable)](https://packagist.org/packages/nguyenanhung/zip-helper) [![License](http://poser.pugx.org/nguyenanhung/zip-helper/license)](https://packagist.org/packages/nguyenanhung/zip-helper) [![PHP Version Require](http://poser.pugx.org/nguyenanhung/zip-helper/require/php)](https://packagist.org/packages/nguyenanhung/zip-helper)

# Zip Helper

PHP Zip Helper - Basic, Simple and Lightweight

## Version

- [x] V1.x support all PHP version `>=5.6`
- [x] V2.x support all PHP version `>=7.0`

## How to use

### Setup helper

Install helper with Composer

```shell
composer require nguyenanhung/zip-helper
```

### Code

You can write your app, and see example code same bellow

```php
<?php

use nguyenanhung\Libraries\Zip\Zip;

require_once __DIR__ . '/vendor/autoload.php';

$fileTest = __DIR__ . '/tmp/test-file.zip';

$zip = new Zip();
$zip->setFilename($fileTest);
$zip->setDataList(
    array(
        __DIR__ . '/docs', // Your Path
        __DIR__ . '/docs/README.md' // Your file
    )
);

// Compress with ZIP
$result = $zip->zip(); // Add all data in $dataList to $filename

d($result);
d(directory_map(__DIR__ . '/tmp'));

// Extract Zip file
$zip->setExtractFolder(__DIR__ . '/tmp'); 
$extract = $zip->unzip();
d($extract);
d(directory_map(__DIR__ . '/tmp'));

```

## Contact & Support

If any question & request, please contact following information

| Name        | Email                | Skype            | Facebook      |
| ----------- | -------------------- | ---------------- | ------------- |
| Hung Nguyen | dev@nguyenanhung.com | nguyenanhung5891 | @nguyenanhung |

From Vietnam with Love <3
