<?php
/**
 * Project mobile-helper
 * Created by PhpStorm
 * User: 713uk13m <dev@nguyenanhung.com>
 * Copyright: 713uk13m <dev@nguyenanhung.com>
 * Date: 09/20/2021
 * Time: 19:18
 */
require_once __DIR__ . '/../vendor/autoload.php';

$data = array(
    'default'        => 'https://nguyenanhung.com/default',
    'link_mobile'    => 'https://nguyenanhung.com/link_mobile',
    'link_tablet'    => 'https://nguyenanhung.com/link_tablet',
    'ios'            => 'https://nguyenanhung.com/ios',
    'android'        => 'https://nguyenanhung.com/android',
    'black_berry'    => 'https://nguyenanhung.com/black_berry',
    'windows_mobile' => 'https://nguyenanhung.com/windows_mobile'
);


echo 'Helper Properties: ' . json_encode(getInfoPropertiesHelperMobileByBear(), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) . PHP_EOL;


echo 'Helper appleMailLink: ' . appleMailLink('dev@nguyenanhung.com') . PHP_EOL;
echo 'Helper applePhoneLink: ' . applePhoneLink('0334582021') . PHP_EOL;
echo 'Helper appleSmsLink: ' . appleSmsLink('0334582021') . PHP_EOL;
echo 'Helper appleFaceTimeVideoLink: ' . appleFaceTimeVideoLink('0334582021') . PHP_EOL;
echo 'Helper appleFaceTimeAudioLink: ' . appleFaceTimeAudioLink('0334582021') . PHP_EOL;
echo 'Helper detectDeviceLinkName: ' . detectDeviceLinkName($data) . PHP_EOL;
echo 'Helper detectDeviceLinkSystem: ' . detectDeviceLinkSystem($data) . PHP_EOL;

