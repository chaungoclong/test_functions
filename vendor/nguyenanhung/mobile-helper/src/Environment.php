<?php
/**
 * Project mobile-helper
 * Created by PhpStorm
 * User: 713uk13m <dev@nguyenanhung.com>
 * Copyright: 713uk13m <dev@nguyenanhung.com>
 * Date: 08/18/2021
 * Time: 07:32
 */

namespace nguyenanhung\Libraries\Mobile;

/**
 * Interface Environment
 *
 * @package   nguyenanhung\Libraries\Mobile
 * @author    713uk13m <dev@nguyenanhung.com>
 * @copyright 713uk13m <dev@nguyenanhung.com>
 */
interface Environment
{
    const VERSION       = '2.0.0';
    const LAST_MODIFIED = '2021-09-24';
    const AUTHOR_NAME   = 'Hung Nguyen';
    const AUTHOR_EMAIL  = 'dev@nguyenanhung.com';
    const AUTHOR_URL    = 'https://nguyenanhung.com';
    const PROJECT_NAME  = 'Basic Helper for Mobile Device';

    /**
     * Function getVersion
     *
     * @return string
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 07/06/2021 44:19
     */
    public function getVersion();
}
