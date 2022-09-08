<?php
/**
 * Project base64-php-helper
 * Created by PhpStorm
 * User: 713uk13m <dev@nguyenanhung.com>
 * Copyright: 713uk13m <dev@nguyenanhung.com>
 * Date: 10/18/2021
 * Time: 00:31
 */

namespace nguyenanhung\Libraries\Base64;

use InvalidArgumentException;

/**
 * Class Base64
 *
 * @package   nguyenanhung\Libraries\Base64
 * @author    713uk13m <dev@nguyenanhung.com>
 * @copyright 713uk13m <dev@nguyenanhung.com>
 */
class Base64
{
    /**
     * Function superBase64Encode
     *
     * @param $input
     *
     * @return string
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 10/18/2021 33:04
     */
    public static function superBase64Encode($input): string
    {
        $output = $input;
        $output = base64_encode($output);
        $output = strrev($output);
        $output = base64_encode($output);
        $output = base64_encode($output);

        return strrev($output);
    }

    /**
     * Function superBase64Decode
     *
     * @param $input
     *
     * @return bool|string
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 10/18/2021 32:59
     */
    public static function superBase64Decode($input)
    {
        $output = $input;
        $output = strrev($output);
        $output = base64_decode($output);
        $output = base64_decode($output);
        $output = strrev($output);

        return base64_decode($output);
    }

    /**
     * Function base64UrlEncode
     *
     * @param       $data
     * @param bool  $usePadding
     *
     * @return string
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 10/18/2021 32:52
     */
    public static function base64UrlEncode($data, bool $usePadding = false): string
    {
        $encoded = strtr(base64_encode($data), '+/', '-_');

        return true === $usePadding ? $encoded : rtrim($encoded, '=');
    }

    /**
     * Function base64UrlDecode
     *
     * @param $data
     *
     * @return string
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 10/18/2021 32:49
     */
    public static function base64UrlDecode($data): string
    {
        $decoded = base64_decode(strtr($data, '-_', '+/'), true);
        if (false === $decoded) {
            throw new InvalidArgumentException('Invalid data provided');
        }

        return $decoded;
    }
}
