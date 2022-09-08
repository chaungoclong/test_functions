<?php
/**
 * Project nanoid-helper
 * Created by PhpStorm
 * User: 713uk13m <dev@nguyenanhung.com>
 * Copyright: 713uk13m <dev@nguyenanhung.com>
 * Date: 09/22/2021
 * Time: 18:14
 */
if (!function_exists('randomNanoId')) {
    /**
     * Function randomNanoId
     *
     * @param int $size
     *
     * @return string
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 09/22/2021 16:50
     */
    function randomNanoId(int $size = 21): string
    {
        $client = new Hidehalo\Nanoid\Client();

        return $client->generateId($size);
    }
}
